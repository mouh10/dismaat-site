@props(['article'])

<a href="{{ route('articles.show', $article->slug) }}" class="card card-hover group flex flex-col overflow-hidden">
    <div class="overflow-hidden">
        @if ($article->image_url)
            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="aspect-[16/9] w-full object-cover transition duration-500 group-hover:scale-105">
        @else
            <x-illustration type="article" :key="$article->id" class="aspect-[16/9] transition duration-500 group-hover:scale-105" />
        @endif
    </div>

    <div class="flex flex-1 flex-col p-5">
        <span class="text-xs font-bold uppercase tracking-wide text-accent-600">
            {{ $article->published_at?->translatedFormat('d F Y') }}
        </span>
        <h3 class="mt-1.5 font-display text-base font-bold text-slate-900 transition group-hover:text-brand-700">{{ $article->title }}</h3>
        @if ($article->excerpt)
            <p class="mt-1.5 line-clamp-2 text-sm text-slate-500">{{ $article->excerpt }}</p>
        @endif
        <span class="mt-auto flex items-center gap-1.5 pt-4 text-sm font-semibold text-brand-700">
            Lire l'article
            <svg class="h-4 w-4 transition group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
        </span>
    </div>
</a>
