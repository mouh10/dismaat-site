@extends('layouts.app')

@section('title', $product->name)
@section('description', $product->short_description ?? $product->name)

@section('content')

    <section class="border-b border-slate-100 bg-slate-50 py-5">
        <div class="container-dismat text-sm text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-brand-700">Accueil</a>
            <span class="mx-2">/</span>
            <a href="{{ route('products.index') }}" class="hover:text-brand-700">Catalogue</a>
            @if ($product->category)
                <span class="mx-2">/</span>
                <a href="{{ route('products.index', ['categorie' => $product->category->slug]) }}" class="hover:text-brand-700">{{ $product->category->name }}</a>
            @endif
            <span class="mx-2">/</span>
            <span class="text-slate-700">{{ $product->name }}</span>
        </div>
    </section>

    <section class="section">
        <div class="container-dismat grid grid-cols-1 gap-12 lg:grid-cols-2">
            <div>
                @if ($product->image_url)
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full rounded-3xl object-cover shadow-soft">
                @else
                    <x-illustration type="category" :key="$product->category?->slug" class="aspect-square" />
                @endif
            </div>

            <div>
                @if ($product->category)
                    <span class="eyebrow">{{ $product->category->name }}</span>
                @endif
                <h1 class="mt-3 text-3xl font-bold text-slate-900">{{ $product->name }}</h1>

                <div class="mt-3 flex flex-wrap gap-x-6 gap-y-1 text-sm text-slate-500">
                    @if ($product->brand)
                        <span>Marque : <strong class="text-slate-700">{{ $product->brand }}</strong></span>
                    @endif
                    @if ($product->reference)
                        <span>Référence : <strong class="text-slate-700">{{ $product->reference }}</strong></span>
                    @endif
                </div>

                <p class="mt-6 font-display text-2xl font-extrabold text-brand-700">
                    @if ($product->price)
                        {{ number_format((float) $product->price, 0, ',', ' ') }} FCFA
                    @else
                        Prix sur devis
                    @endif
                </p>

                @if ($product->description)
                    <div class="prose prose-slate mt-6 max-w-none text-slate-600">
                        <p class="whitespace-pre-line leading-relaxed">{{ $product->description }}</p>
                    </div>
                @endif

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('contact.index') }}" class="btn-primary">Demander un devis</a>
                    <a href="tel:{{ config('dismat.phone_href') }}" class="btn-outline">Appeler DISMAT</a>
                </div>
            </div>
        </div>
    </section>

    @if ($related->isNotEmpty())
        <section class="section bg-slate-50">
            <div class="container-dismat">
                <h2 class="text-2xl font-bold text-slate-900">Produits similaires</h2>
                <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($related as $item)
                        @include('products.partials.card', ['product' => $item])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
