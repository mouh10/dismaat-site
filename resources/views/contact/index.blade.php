@extends('layouts.app')

@section('title', 'Contact')
@section('description', 'Contactez DISMAT à Dakar : adresse, téléphone, email et formulaire de demande de devis.')

@section('content')

    <x-page-header eyebrow="Contact" title="Parlons de votre projet"
        subtitle="Une question, un besoin de devis ou une demande de maintenance ? Notre équipe vous répond rapidement." />

    <section class="section">
        <div class="container-dismat grid grid-cols-1 gap-12 lg:grid-cols-5">

            <div class="lg:col-span-2" data-animate>
                <h2 class="text-lg font-bold text-slate-900">Nos coordonnées</h2>
                <ul class="mt-6 space-y-4 text-sm">
                    <li class="card flex gap-3.5 p-4">
                        <span class="icon-badge h-11 w-11 flex-shrink-0">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                        </span>
                        <div>
                            <p class="font-semibold text-slate-800">Adresse</p>
                            <p class="text-slate-600">{{ config('dismat.address_line') }}<br>{{ config('dismat.city') }}<br>{{ config('dismat.po_box') }}</p>
                        </div>
                    </li>
                    <li class="card flex gap-3.5 p-4">
                        <span class="icon-badge h-11 w-11 flex-shrink-0">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a1.5 1.5 0 0 0 1.5-1.5v-2.25a1.5 1.5 0 0 0-1.5-1.5h-2.25a1.5 1.5 0 0 0-1.5 1.5v.75c-3.75-.75-6.75-3.75-7.5-7.5h.75a1.5 1.5 0 0 0 1.5-1.5V6.75a1.5 1.5 0 0 0-1.5-1.5H6.75a1.5 1.5 0 0 0-1.5 1.5Z" /></svg>
                        </span>
                        <div>
                            <p class="font-semibold text-slate-800">Téléphone / Fax</p>
                            <p class="text-slate-600">
                                <a href="tel:{{ config('dismat.phone_href') }}" class="hover:text-brand-700">{{ config('dismat.phone') }}</a><br>
                                Fax : {{ config('dismat.fax') }}
                            </p>
                        </div>
                    </li>
                    <li class="card flex gap-3.5 p-4">
                        <span class="icon-badge h-11 w-11 flex-shrink-0">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
                        </span>
                        <div>
                            <p class="font-semibold text-slate-800">Email</p>
                            <p class="text-slate-600">
                                <a href="mailto:{{ config('dismat.email') }}" class="hover:text-brand-700">{{ config('dismat.email') }}</a>
                            </p>
                        </div>
                    </li>
                    <li class="card flex gap-3.5 p-4">
                        <span class="icon-badge h-11 w-11 flex-shrink-0">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                        </span>
                        <div>
                            <p class="font-semibold text-slate-800">Horaires</p>
                            @foreach (config('dismat.hours') as $day => $hours)
                                <p class="text-slate-600">{{ $day }} : {{ $hours }}</p>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>

            <div class="lg:col-span-3 animate-delay-200" data-animate>
                <form method="POST" action="{{ route('contact.store') }}" class="card space-y-5 p-6 sm:p-8">
                    @csrf

                    {{-- Champ piège anti-spam : doit rester vide, masqué visuellement --}}
                    <div class="hidden" aria-hidden="true">
                        <label for="website">Laisser vide</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-slate-700">Nom complet *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                   class="mt-1.5 w-full rounded-xl border-slate-200 text-sm focus:border-brand-500 focus:ring-brand-500 @error('name') border-red-400 @enderror">
                            @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700">Email *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                   class="mt-1.5 w-full rounded-xl border-slate-200 text-sm focus:border-brand-500 focus:ring-brand-500 @error('email') border-red-400 @enderror">
                            @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-slate-700">Téléphone</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                   class="mt-1.5 w-full rounded-xl border-slate-200 text-sm focus:border-brand-500 focus:ring-brand-500">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-semibold text-slate-700">Sujet</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                   class="mt-1.5 w-full rounded-xl border-slate-200 text-sm focus:border-brand-500 focus:ring-brand-500">
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-semibold text-slate-700">Message *</label>
                        <textarea id="message" name="message" rows="5" required
                                  class="mt-1.5 w-full rounded-xl border-slate-200 text-sm focus:border-brand-500 focus:ring-brand-500 @error('message') border-red-400 @enderror">{{ old('message') }}</textarea>
                        @error('message') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="btn-primary w-full sm:w-auto">
                        Envoyer le message
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.126A59.77 59.77 0 0 1 21.485 12 59.77 59.77 0 0 1 3.27 20.876L5.999 12Zm0 0h7.5" /></svg>
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection
