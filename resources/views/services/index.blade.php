@extends('layouts.app')

@section('title', 'Nos services')
@section('description', 'Vente, installation, maintenance, contrats de service et conseil : découvrez les services de DISMAT pour équiper votre entreprise.')

@section('content')

    <x-page-header eyebrow="Nos services" title="Un accompagnement complet, du conseil à la maintenance"
        subtitle="DISMAT ne se limite pas à la vente d'équipements : nous accompagnons nos clients à chaque étape de leur projet." />

    <section class="section">
        <div class="container-dismat">
            @if ($services->isEmpty())
                <p class="text-slate-600">Les services seront bientôt disponibles.</p>
            @else
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($services as $i => $service)
                        <div data-animate class="animate-delay-{{ min(($i % 3 + 1) * 100, 300) }} card card-hover p-7">
                            <span class="icon-badge-accent">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                                </svg>
                            </span>
                            <h2 class="mt-5 text-lg font-bold text-slate-900">{{ $service->title }}</h2>
                            <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ $service->short_description }}</p>
                            @if ($service->description)
                                <p class="mt-3 whitespace-pre-line border-t border-slate-100 pt-3 text-sm leading-relaxed text-slate-500">{{ $service->description }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20">
        <div class="container-dismat">
            <div class="flex flex-col items-center gap-5 rounded-md border-[1.5px] border-brand-700 px-8 py-10 text-center">
                <h2 class="font-display text-2xl font-extrabold text-brand-700 sm:text-3xl">Discutons de votre projet</h2>
                <p class="max-w-2xl text-slate-600">Nos équipes techniques et commerciales sont à votre écoute pour construire la solution la plus adaptée.</p>
                <a href="{{ route('contact.index') }}" class="btn-primary">Demander un devis gratuit</a>
            </div>
        </div>
    </section>

@endsection
