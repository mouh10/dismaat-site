{{--
    Vue de pagination personnalisée aux couleurs DISMAT.
    Laravel résout automatiquement "pagination::tailwind" vers ce fichier
    (resources/views/vendor/pagination/tailwind.blade.php) sans configuration
    supplémentaire : tous les appels à ->links() dans le projet en profitent.
    Précédent/Suivant sont des flèches (icônes), jamais des clés de traduction.
--}}
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex flex-col items-center gap-4 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-sm text-slate-500">
            {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} sur {{ $paginator->total() }} résultat{{ $paginator->total() > 1 ? 's' : '' }}
        </p>

        <div class="flex items-center gap-1.5">
            {{-- Précédent --}}
            @if ($paginator->onFirstPage())
                <span aria-disabled="true" class="flex h-10 w-10 items-center justify-center rounded-md border border-slate-200 text-slate-300">
                    <span class="sr-only">Page précédente</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="flex h-10 w-10 items-center justify-center rounded-md border border-slate-200 text-brand-700 transition hover:border-brand-700 hover:bg-brand-50">
                    <span class="sr-only">Page précédente</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                </a>
            @endif

            {{-- Numéros de page --}}
            <div class="hidden items-center gap-1.5 sm:flex">
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="flex h-10 w-10 items-center justify-center text-sm text-slate-400">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page" class="flex h-10 w-10 items-center justify-center rounded-md bg-brand-700 text-sm font-bold text-white">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="flex h-10 w-10 items-center justify-center rounded-md border border-slate-200 text-sm font-semibold text-slate-600 transition hover:border-brand-700 hover:text-brand-700">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Page courante sur mobile (pas assez de place pour tous les numéros) --}}
            <span class="flex h-10 items-center rounded-md border border-slate-200 px-3 text-sm font-semibold text-slate-600 sm:hidden">
                {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}
            </span>

            {{-- Suivant --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="flex h-10 w-10 items-center justify-center rounded-md border border-slate-200 text-brand-700 transition hover:border-brand-700 hover:bg-brand-50">
                    <span class="sr-only">Page suivante</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                </a>
            @else
                <span aria-disabled="true" class="flex h-10 w-10 items-center justify-center rounded-md border border-slate-200 text-slate-300">
                    <span class="sr-only">Page suivante</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                </span>
            @endif
        </div>
    </nav>
@endif
