@props(['product'])

<a href="{{ route('products.show', $product->slug) }}" class="card card-hover group flex flex-col overflow-hidden">
    <div class="relative overflow-hidden">
        @if ($product->image_url)
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105">
        @else
            <x-illustration type="category" :key="$product->category?->slug" class="aspect-[4/3] transition duration-500 group-hover:scale-105" />
        @endif

        @if ($product->is_featured)
            <span class="absolute left-3 top-3 rounded-sm bg-accent-500 px-3 py-1 text-[11px] font-bold uppercase tracking-wide text-white">
                Populaire
            </span>
        @endif
    </div>

    <div class="flex flex-1 flex-col p-5">
        @if ($product->category)
            <span class="text-xs font-bold uppercase tracking-wide text-accent-600">{{ $product->category->name }}</span>
        @endif
        <h3 class="mt-1.5 font-display text-base font-bold text-slate-900 transition group-hover:text-brand-700">{{ $product->name }}</h3>
        @if ($product->short_description)
            <p class="mt-1.5 line-clamp-2 text-sm text-slate-500">{{ $product->short_description }}</p>
        @endif
        <div class="mt-auto flex items-center justify-between border-t border-slate-100 pt-4">
            <span class="font-display text-sm font-bold text-slate-900">
                @if ($product->price)
                    {{ number_format((float) $product->price, 0, ',', ' ') }} FCFA
                @else
                    Sur devis
                @endif
            </span>
            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-brand-50 text-brand-700 transition group-hover:bg-brand-600 group-hover:text-white">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" /></svg>
            </span>
        </div>
    </div>
</a>
