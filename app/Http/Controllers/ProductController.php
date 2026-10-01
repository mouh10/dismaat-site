<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::query()
            ->active()
            ->with('category')
            ->when($request->filled('categorie'), function ($query) use ($request) {
                $query->whereHas('category', fn ($q) => $q->where('slug', $request->string('categorie')));
            })
            ->when($request->filled('q'), function ($query) use ($request) {
                $search = $request->string('q');
                $query->where(fn ($q) => $q
                    ->where('name', 'ilike', "%{$search}%")
                    ->orWhere('brand', 'ilike', "%{$search}%")
                    ->orWhere('short_description', 'ilike', "%{$search}%"));
            })
            ->orderBy('order')
            ->paginate(12)
            ->withQueryString();

        return view('products.index', [
            'products' => $products,
            'categories' => Category::orderBy('order')->withCount('activeProducts')->get(),
            'activeCategory' => $request->string('categorie')->toString(),
            'search' => $request->string('q')->toString(),
        ]);
    }

    public function show(string $slug): View
    {
        $product = Product::active()->with('category')->where('slug', $slug)->firstOrFail();

        $related = Product::active()
            ->with('category')
            ->where('id', '!=', $product->id)
            ->when($product->category_id, fn ($q) => $q->where('category_id', $product->category_id))
            ->take(4)
            ->get();

        return view('products.show', [
            'product' => $product,
            'related' => $related,
        ]);
    }
}
