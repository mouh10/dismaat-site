<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('articles.index', [
            'articles' => Article::published()->orderByDesc('published_at')->paginate(9),
        ]);
    }

    public function show(string $slug): View
    {
        $article = Article::published()->where('slug', $slug)->firstOrFail();

        $recent = Article::published()
            ->where('id', '!=', $article->id)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('articles.show', [
            'article' => $article,
            'recent' => $recent,
        ]);
    }
}
