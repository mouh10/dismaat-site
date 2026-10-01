<footer class="bg-brand-800 text-slate-300">
    <div class="container-dismat grid grid-cols-1 gap-10 py-16 sm:grid-cols-2 lg:grid-cols-4">
        <div>
            <div class="inline-flex items-center rounded-lg bg-white px-4 py-2.5">
                <img src="{{ asset('images/logo-dismat.png') }}" alt="DISMAT" class="h-6 w-auto">
            </div>
            <p class="mt-4 text-sm leading-relaxed text-slate-400">
                {{ config('dismat.baseline') }}. Basée à Dakar, DISMAT accompagne les entreprises et administrations sénégalaises dans l'équipement et la modernisation de leurs bureaux.
            </p>
        </div>

        <div>
            <h3 class="font-display text-sm font-bold uppercase tracking-wide text-white">Navigation</h3>
            <ul class="mt-5 space-y-3 text-sm">
                <li><a href="{{ route('about') }}" class="transition hover:text-accent-300">À propos</a></li>
                <li><a href="{{ route('services.index') }}" class="transition hover:text-accent-300">Nos services</a></li>
                <li><a href="{{ route('products.index') }}" class="transition hover:text-accent-300">Catalogue produits</a></li>
                <li><a href="{{ route('articles.index') }}" class="transition hover:text-accent-300">Actualités</a></li>
                <li><a href="{{ route('contact.index') }}" class="transition hover:text-accent-300">Contact</a></li>
            </ul>
        </div>

        <div>
            <h3 class="font-display text-sm font-bold uppercase tracking-wide text-white">Contact</h3>
            <ul class="mt-5 space-y-3.5 text-sm">
                <li class="flex gap-2.5">
                    <svg class="mt-0.5 h-4 w-4 flex-shrink-0 text-accent-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                    <span>{{ config('dismat.address_line') }}, {{ config('dismat.city') }} — {{ config('dismat.po_box') }}</span>
                </li>
                <li class="flex gap-2.5">
                    <svg class="h-4 w-4 flex-shrink-0 text-accent-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a1.5 1.5 0 0 0 1.5-1.5v-2.25a1.5 1.5 0 0 0-1.5-1.5h-2.25a1.5 1.5 0 0 0-1.5 1.5v.75c-3.75-.75-6.75-3.75-7.5-7.5h.75a1.5 1.5 0 0 0 1.5-1.5V6.75a1.5 1.5 0 0 0-1.5-1.5H6.75a1.5 1.5 0 0 0-1.5 1.5Z" /></svg>
                    <a href="tel:{{ config('dismat.phone_href') }}" class="transition hover:text-accent-300">{{ config('dismat.phone') }}</a>
                </li>
                <li class="flex gap-2.5">
                    <svg class="h-4 w-4 flex-shrink-0 text-accent-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
                    <a href="mailto:{{ config('dismat.email') }}" class="transition hover:text-accent-300">{{ config('dismat.email') }}</a>
                </li>
                <li class="flex gap-2.5">
                    <svg class="h-4 w-4 flex-shrink-0 text-accent-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.5h16.5v3.379a1.5 1.5 0 0 1-.44 1.06l-4.72 4.72a1.5 1.5 0 0 0-.44 1.061v4.28l-3 1.5v-5.78a1.5 1.5 0 0 0-.44-1.06l-4.72-4.72a1.5 1.5 0 0 1-.44-1.061V4.5Z" /></svg>
                    <span>Fax : {{ config('dismat.fax') }}</span>
                </li>
            </ul>
        </div>

        <div>
            <h3 class="font-display text-sm font-bold uppercase tracking-wide text-white">Horaires</h3>
            <ul class="mt-5 space-y-2.5 text-sm">
                @foreach (config('dismat.hours') as $day => $hours)
                    <li class="flex justify-between gap-4 border-b border-white/10 pb-2.5">
                        <span>{{ $day }}</span>
                        <span class="font-medium text-slate-200">{{ $hours }}</span>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('contact.index') }}" class="btn-ghost-light mt-6 w-full text-sm">
                Nous écrire
            </a>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="container-dismat flex flex-col gap-2 py-6 text-xs text-slate-500 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ now()->year }} {{ config('dismat.name') }}. Tous droits réservés.</p>
            <p class="flex flex-wrap items-center gap-x-4">
                <span>RC {{ config('dismat.rc') }}</span>
                <span>NINEA {{ config('dismat.ninea') }}</span>
                <a href="{{ route('legal.mentions') }}" class="hover:text-slate-300">Mentions légales</a>
            </p>
        </div>
    </div>
</footer>
