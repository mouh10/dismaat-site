<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home.index', [
            'services' => Service::active()->orderBy('order')->take(6)->get(),
            'featuredProducts' => Product::active()->featured()->with('category')->orderBy('order')->take(8)->get(),
            'categories' => Category::orderBy('order')->take(6)->get(),
            'articles' => Article::published()->latest('published_at')->take(3)->get(),
        ]);
    }
}
