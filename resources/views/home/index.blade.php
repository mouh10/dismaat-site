@extends('layouts.app')

@section('title', 'Accueil')
@section('description', 'DISMAT équipe les entreprises sénégalaises en matériel bureautique et informatique : vente, installation, maintenance et consommables, à Dakar.')

@section('content')

    {{-- Hero --}}
    <section class="bg-white">
        <div class="container-dismat grid grid-cols-1 gap-14 py-16 sm:py-20 lg:grid-cols-12 lg:gap-10">
            <div class="lg:col-span-7">
                <span class="eyebrow" data-animate>Fournisseur agréé — marchés publics &amp; privés</span>
                <h1 class="mt-5 font-display text-4xl font-extrabold leading-[1.15] text-brand-700 sm:text-5xl" data-animate>
                    L'équipement bureautique et informatique de référence au Sénégal
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-relaxed text-slate-600" data-animate>
                    Depuis Dakar, DISMAT accompagne entreprises, administrations et particuliers dans le choix, la fourniture et l'entretien de leurs équipements de bureau : ordinateurs, imprimantes, mobilier, réseaux et consommables.
                </p>
                <div class="mt-8 flex flex-wrap gap-3.5" data-animate>
                    <a href="{{ route('products.index') }}" class="btn-primary">
                        Voir le catalogue
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
                    </a>
                    <a href="{{ route('contact.index') }}" class="btn-outline">Demander un devis</a>
                </div>

                <div class="mt-14 flex border-l border-t border-slate-200" data-animate>
                    @foreach ([
                        ['value' => 15, 'suffix' => '+', 'label' => "ans d'expérience"],
                        ['value' => 500, 'suffix' => '+', 'label' => 'entreprises équipées'],
                        ['value' => 48, 'suffix' => 'h', 'label' => 'délai moyen'],
                    ] as $stat)
                        <div class="flex-1 border-b border-r border-slate-200 px-6 py-5">
                            <div class="text-2xl font-extrabold text-brand-700" data-count="{{ $stat['value'] }}" data-count-suffix="{{ $stat['suffix'] }}">0{{ $stat['suffix'] }}</div>
                            <div class="mt-1 text-xs text-slate-500">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-5 animate-delay-200" data-animate>
                <div class="rounded-md border border-slate-200 bg-white">
                    <div class="rounded-t-md bg-brand-700 px-6 py-4">
                        <span class="text-sm font-bold tracking-wide text-white">Fiche entreprise</span>
                    </div>
                    <div class="px-6 py-2">
                        <div class="flex justify-between gap-4 border-b border-slate-100 py-3.5">
                            <span class="text-sm text-slate-500">Adresse</span>
                            <span class="max-w-[220px] text-right text-sm font-semibold text-brand-700">{{ config('dismat.address_line') }}</span>
                        </div>
                        <div class="flex justify-between gap-4 border-b border-slate-100 py-3.5">
                            <span class="text-sm text-slate-500">Téléphone</span>
                            <span class="text-sm font-semibold text-brand-700">{{ config('dismat.phone') }}</span>
                        </div>
                        <div class="flex justify-between gap-4 border-b border-slate-100 py-3.5">
                            <span class="text-sm text-slate-500">Registre du commerce</span>
                            <span class="text-sm font-semibold text-brand-700">{{ config('dismat.rc') }}</span>
                        </div>
                        <div class="flex justify-between gap-4 border-b border-slate-100 py-3.5">
                            <span class="text-sm text-slate-500">NINEA</span>
                            <span class="text-sm font-semibold text-brand-700">{{ config('dismat.ninea') }}</span>
                        </div>
                        <div class="flex justify-between gap-4 py-3.5">
                            <span class="text-sm text-slate-500">Banque</span>
                            <span class="text-sm font-semibold text-brand-700">{{ config('dismat.bank.name') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Catégories --}}
    @if ($categories->isNotEmpty())
        <section class="section border-t border-slate-200 bg-white">
            <div class="container-dismat">
                <span class="eyebrow" data-animate>Nos univers produits</span>
                <h2 class="mt-4 font-display text-3xl font-extrabold text-brand-700 sm:text-4xl" data-animate>Tout l'équipement de votre bureau</h2>

                <div class="mt-10 border-t border-slate-200">
                    @foreach ($categories as $i => $category)
                        <a href="{{ route('products.index', ['categorie' => $category->slug]) }}"
                           data-animate class="group flex items-center gap-6 border-b border-slate-200 px-1 py-5 transition hover:bg-slate-50 sm:gap-8">
                            <span class="w-8 flex-shrink-0 text-sm font-extrabold text-accent-600">{{ sprintf('%02d', $i + 1) }}</span>
                            <span class="w-40 flex-shrink-0 font-display text-base font-extrabold text-brand-700 sm:w-56 sm:text-lg">{{ $category->name }}</span>
                            <span class="hidden flex-1 truncate text-sm text-slate-500 sm:block">{{ $category->description ?? 'Découvrir la sélection complète de cette gamme.' }}</span>
                            <svg class="h-5 w-5 flex-shrink-0 text-brand-700 transition group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Services --}}
    @if ($services->isNotEmpty())
        <section class="section bg-slate-50">
            <div class="container-dismat">
                <span class="eyebrow" data-animate>Ce que nous faisons</span>
                <h2 class="mt-4 font-display text-3xl font-extrabold text-brand-700 sm:text-4xl" data-animate>Nos services</h2>

                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($services as $i => $service)
                        <div data-animate class="animate-delay-{{ min(($i % 3 + 1) * 100, 300) }} card card-hover p-7">
                            <span class="icon-badge">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 0 1 0 .255c-.007.378.138.75.43.991l1.005.828c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 0 1 0-.255c.007-.378-.138-.75-.43-.991l-1.004-.828a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </span>
                            <h3 class="mt-5 font-display text-lg font-extrabold text-brand-700">{{ $service->title }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ $service->short_description }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12" data-animate>
                    <a href="{{ route('services.index') }}" class="btn-outline">
                        Voir tous nos services
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- Produits en avant --}}
    @if ($featuredProducts->isNotEmpty())
        <section class="section bg-white">
            <div class="container-dismat">
                <div class="flex flex-wrap items-end justify-between gap-4" data-animate>
                    <div>
                        <span class="eyebrow">Sélection</span>
                        <h2 class="mt-4 font-display text-3xl font-extrabold text-brand-700 sm:text-4xl">Produits mis en avant</h2>
                    </div>
                    <a href="{{ route('products.index') }}" class="flex items-center gap-1.5 text-sm font-semibold text-brand-700 hover:text-brand-800">
                        Voir tout le catalogue
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
                    </a>
                </div>

                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($featuredProducts as $i => $product)
                        <div data-animate class="animate-delay-{{ min(($i % 4 + 1) * 100, 400) }}">
                            @include('products.partials.card', ['product' => $product])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Actualités --}}
    @if ($articles->isNotEmpty())
        <section class="section bg-slate-50">
            <div class="container-dismat">
                <span class="eyebrow" data-animate>Actualités</span>
                <h2 class="mt-4 font-display text-3xl font-extrabold text-brand-700 sm:text-4xl" data-animate>Dernières nouvelles de DISMAT</h2>

                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    @foreach ($articles as $i => $article)
                        <div data-animate class="animate-delay-{{ min(($i + 1) * 100, 300) }}">
                            @include('articles.partials.card', ['article' => $article])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA --}}
    <section class="bg-white py-16 sm:py-20">
        <div class="container-dismat">
            <div class="flex flex-col items-start gap-6 rounded-md border-[1.5px] border-brand-700 px-8 py-10 sm:flex-row sm:items-center sm:justify-between sm:px-14">
                <div>
                    <h2 class="font-display text-2xl font-extrabold text-brand-700 sm:text-3xl">Un projet d'équipement pour votre entreprise ?</h2>
                    <p class="mt-2 max-w-xl text-slate-600">Nos conseillers étudient vos besoins et vous proposent une offre adaptée à votre budget et à votre activité.</p>
                </div>
                <a href="{{ route('contact.index') }}" class="btn-primary flex-shrink-0">
                    Contactez notre équipe
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
                </a>
            </div>
        </div>
    </section>

@endsection
