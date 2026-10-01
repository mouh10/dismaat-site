@php
    $navLinks = [
        ['label' => 'Accueil', 'route' => 'home'],
        ['label' => 'À propos', 'route' => 'about'],
        ['label' => 'Services', 'route' => 'services.index'],
        ['label' => 'Catalogue', 'route' => 'products.index'],
        ['label' => 'Actualités', 'route' => 'articles.index'],
        ['label' => 'Contact', 'route' => 'contact.index'],
    ];
@endphp

<header id="site-header" class="sticky top-0 z-40 border-b border-slate-200 bg-white">
    <div class="container-dismat flex h-[92px] items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3.5">
            <img src="{{ asset('images/logo-dismat.png') }}" alt="DISMAT" class="h-9 w-auto sm:h-10">
            <span class="hidden border-l border-slate-200 pl-3.5 text-[10px] font-semibold uppercase leading-tight tracking-wider text-slate-400 sm:block">
                Depuis<br>2009 · Dakar
            </span>
        </a>

        <nav class="hidden items-center gap-9 lg:flex">
            @foreach ($navLinks as $link)
                <a href="{{ route($link['route']) }}"
                   class="text-sm font-semibold transition {{ request()->routeIs($link['route']) || request()->routeIs($link['route'].'.*') ? 'text-brand-700' : 'text-slate-600 hover:text-brand-700' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="hidden lg:flex lg:items-center">
            <a href="{{ route('contact.index') }}" class="btn-primary py-3 text-sm">
                Demander un devis
            </a>
        </div>

        <button id="mobile-menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-menu"
                class="inline-flex items-center justify-center rounded-md p-2 text-slate-600 hover:bg-slate-50 lg:hidden">
            <span class="sr-only">Ouvrir le menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="lg:hidden">
        <nav class="container-dismat flex flex-col gap-1 border-t border-slate-100 py-4">
            @foreach ($navLinks as $link)
                <a href="{{ route($link['route']) }}"
                   class="rounded-md px-4 py-2.5 text-sm font-semibold {{ request()->routeIs($link['route']) ? 'bg-brand-50 text-brand-700' : 'text-slate-700 hover:bg-slate-50' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
            <a href="{{ route('contact.index') }}" class="btn-primary mt-2 justify-center">Demander un devis</a>
        </nav>
    </div>
</header>
