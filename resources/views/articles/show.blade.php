@extends('layouts.app')

@section('title', $article->title)
@section('description', $article->excerpt ?? $article->title)

@section('content')

    <section class="border-b border-slate-100 bg-slate-50 py-5">
        <div class="container-dismat text-sm text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-brand-700">Accueil</a>
            <span class="mx-2">/</span>
            <a href="{{ route('articles.index') }}" class="hover:text-brand-700">Actualités</a>
            <span class="mx-2">/</span>
            <span class="text-slate-700">{{ $article->title }}</span>
        </div>
    </section>

    <article class="section">
        <div class="container-dismat max-w-3xl">
            <span class="eyebrow">{{ $article->published_at?->translatedFormat('d F Y') }} @if($article->author) — {{ $article->author }} @endif</span>
            <h1 class="mt-3 text-3xl font-bold text-slate-900 sm:text-4xl">{{ $article->title }}</h1>

            <div class="mt-8">
                @if ($article->image_url)
                    <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full rounded-3xl object-cover shadow-soft">
                @else
                    <x-illustration type="article" :key="$article->id" class="aspect-[16/9]" />
                @endif
            </div>

            <div class="prose prose-slate mt-8 max-w-none text-slate-600">
                <p class="whitespace-pre-line leading-relaxed">{{ $article->content }}</p>
            </div>
        </div>
    </article>

    @if ($recent->isNotEmpty())
        <section class="section bg-slate-50">
            <div class="container-dismat">
                <h2 class="text-2xl font-bold text-slate-900">À lire aussi</h2>
                <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    @foreach ($recent as $item)
                        @include('articles.partials.card', ['article' => $item])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
