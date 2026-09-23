@extends('layouts.app')

@section('title', 'Catalogue produits')
@section('description', 'Découvrez le catalogue DISMAT : ordinateurs, imprimantes, mobilier de bureau, consommables et équipements réseau.')

@section('content')

    <x-page-header eyebrow="Catalogue" title="Nos produits"
        subtitle="Parcourez notre gamme de matériel bureautique et informatique. Les prix affichés sont indicatifs ; contactez-nous pour une offre adaptée à vos volumes." />

    <section class="section">
        <div class="container-dismat grid grid-cols-1 gap-10 lg:grid-cols-4">

            <aside class="lg:col-span-1">
                <form method="GET" action="{{ route('products.index') }}" class="mb-6">
                    <label for="q" class="sr-only">Rechercher</label>
                    <div class="flex gap-2">
                        <input type="text" id="q" name="q" value="{{ $search }}" placeholder="Rechercher un produit..."
                               class="w-full rounded-full border-slate-200 text-sm focus:border-brand-500 focus:ring-brand-500">
                        <button type="submit" class="btn-primary px-4">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg>
                        </button>
                    </div>
                </form>

                <h2 class="text-sm font-bold uppercase tracking-wide text-slate-500">Catégories</h2>
                <ul class="mt-3 space-y-1">
                    <li>
                        <a href="{{ route('products.index') }}"
                           class="flex items-center justify-between rounded-xl px-3 py-2.5 text-sm font-semibold {{ $activeCategory === '' ? 'bg-brand-50 text-brand-700' : 'text-slate-600 hover:bg-slate-50' }}">
                            Toutes les catégories
                        </a>
                    </li>
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('products.index', ['categorie' => $category->slug]) }}"
                               class="flex items-center justify-between rounded-xl px-3 py-2.5 text-sm font-semibold {{ $activeCategory === $category->slug ? 'bg-brand-50 text-brand-700' : 'text-slate-600 hover:bg-slate-50' }}">
                                <span>{{ $category->name }}</span>
                                <span class="rounded-full bg-slate-100 px-2 py-0.5 text-xs text-slate-500">{{ $category->active_products_count }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-8 rounded-md border border-slate-200 bg-slate-50 p-6">
                    <p class="text-sm font-bold text-brand-700">Vous ne trouvez pas ce qu'il vous faut ?</p>
                    <p class="mt-1.5 text-sm text-slate-600">Notre équipe peut sourcer des références spécifiques sur devis.</p>
                    <a href="{{ route('contact.index') }}" class="mt-3 inline-flex items-center gap-1 text-sm font-semibold text-brand-700 hover:text-brand-900">Nous contacter
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
                    </a>
                </div>
            </aside>

            <div class="lg:col-span-3">
                @if ($products->isEmpty())
                    <div class="card p-10 text-center">
                        <p class="text-slate-600">Aucun produit ne correspond à votre recherche pour le moment.</p>
                        <a href="{{ route('products.index') }}" class="btn-outline mt-4 inline-flex">Réinitialiser les filtres</a>
                    </div>
                @else
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">
                        @foreach ($products as $product)
                            @include('products.partials.card', ['product' => $product])
                        @endforeach
                    </div>

                    <div class="mt-10">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
