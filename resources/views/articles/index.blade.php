@extends('layouts.app')

@section('title', 'Actualités')
@section('description', 'Suivez les actualités de DISMAT : nouveautés produits, événements et conseils autour de l\'équipement de bureau.')

@section('content')

    <x-page-header eyebrow="Actualités" title="Les dernières nouvelles de DISMAT" />

    <section class="section">
        <div class="container-dismat">
            @if ($articles->isEmpty())
                <p class="text-slate-600">Aucun article publié pour le moment.</p>
            @else
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($articles as $article)
                        @include('articles.partials.card', ['article' => $article])
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $articles->links() }}
                </div>
            @endif
        </div>
    </section>

@endsection
