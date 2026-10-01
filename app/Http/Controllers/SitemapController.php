<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $staticUrls = [
            ['url' => route('home'), 'priority' => '1.0'],
            ['url' => route('about'), 'priority' => '0.7'],
            ['url' => route('services.index'), 'priority' => '0.7'],
            ['url' => route('products.index'), 'priority' => '0.9'],
            ['url' => route('articles.index'), 'priority' => '0.6'],
            ['url' => route('contact.index'), 'priority' => '0.6'],
            ['url' => route('legal.mentions'), 'priority' => '0.2'],
        ];

        $productUrls = Product::active()
            ->orderByDesc('updated_at')
            ->get(['slug', 'updated_at'])
            ->map(fn (Product $product) => [
                'url' => route('products.show', $product->slug),
                'lastmod' => $product->updated_at?->toAtomString(),
                'priority' => '0.8',
            ]);

        $articleUrls = Article::published()
            ->orderByDesc('updated_at')
            ->get(['slug', 'updated_at'])
            ->map(fn (Article $article) => [
                'url' => route('articles.show', $article->slug),
                'lastmod' => $article->updated_at?->toAtomString(),
                'priority' => '0.5',
            ]);

        $urls = collect($staticUrls)->concat($productUrls)->concat($articleUrls);

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }
}
