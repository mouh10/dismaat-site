@extends('layouts.app')

@section('title', 'À propos')
@section('description', "Présentation de DISMAT, distributeur de matériel bureautique et informatique basé à Dakar : histoire, valeurs et engagement qualité.")

@section('content')

    <x-page-header eyebrow="À propos de nous" title="DISMAT, votre partenaire équipement au Sénégal" />

    <section class="section">
        <div class="container-dismat grid grid-cols-1 gap-12 lg:grid-cols-2 lg:items-center">
            <div data-animate>
                <h2 class="text-2xl font-bold text-slate-900">Notre histoire</h2>
                <p class="mt-4 leading-relaxed text-slate-600">
                    Implantée à Dakar, au cœur du quartier des affaires sur l'Avenue Jean Jaurès, DISMAT s'est imposée comme un acteur de référence dans la distribution de matériel bureautique et informatique au Sénégal. Notre mission : permettre à chaque entreprise, administration et professionnel d'accéder à un équipement fiable, au juste prix, avec un service après-vente réactif.
                </p>
                <p class="mt-4 leading-relaxed text-slate-600">
                    Au fil des années, nous avons construit un catalogue large — ordinateurs, imprimantes, mobilier de bureau, consommables et solutions réseau — ainsi qu'un réseau de partenaires et de marques reconnues, pour répondre aussi bien aux petites structures qu'aux grands comptes et marchés publics.
                </p>
            </div>
            <div data-animate class="animate-delay-200">
                <x-illustration type="about" class="aspect-[4/3]" />
            </div>
        </div>
    </section>

    <section class="section bg-slate-50">
        <div class="container-dismat">
            <div class="max-w-2xl" data-animate>
                <span class="eyebrow">Nos valeurs</span>
                <h2 class="mt-4 text-3xl font-extrabold text-brand-700">Ce qui guide notre travail au quotidien</h2>
            </div>

            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-3">
                @foreach ([
                    ['title' => 'Fiabilité', 'text' => 'Des produits sélectionnés auprès de marques reconnues et un stock disponible pour limiter les délais.'],
                    ['title' => 'Proximité', 'text' => 'Une équipe basée à Dakar, joignable directement, qui comprend les réalités du marché local.'],
                    ['title' => 'Exigence', 'text' => 'Un service après-vente et une maintenance suivis pour assurer la durée de vie de vos équipements.'],
                ] as $i => $value)
                    <div data-animate class="animate-delay-{{ ($i + 1) * 100 }} card card-hover p-7">
                        <span class="icon-badge">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                        </span>
                        <h3 class="mt-5 text-lg font-bold text-slate-900">{{ $value['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ $value['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20">
        <div class="container-dismat">
            <div class="flex flex-col items-center gap-5 rounded-md border-[1.5px] border-brand-700 px-8 py-10 text-center">
                <h2 class="font-display text-2xl font-extrabold text-brand-700 sm:text-3xl">Une question sur nos produits ou services ?</h2>
                <p class="max-w-xl text-slate-600">Notre équipe commerciale se tient à votre disposition pour étudier vos besoins et vous proposer une offre sur mesure.</p>
                <a href="{{ route('contact.index') }}" class="btn-primary">Nous contacter</a>
            </div>
        </div>
    </section>

@endsection
