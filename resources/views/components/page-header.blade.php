@props(['eyebrow' => null, 'title', 'subtitle' => null])

<section class="border-b border-slate-200 bg-slate-50 py-14 sm:py-16">
    <div class="container-dismat">
        @if ($eyebrow)
            <span class="eyebrow">{{ $eyebrow }}</span>
        @endif
        <h1 class="mt-4 font-display text-3xl font-extrabold text-brand-700 sm:text-4xl lg:text-[2.75rem]">{{ $title }}</h1>
        @if ($subtitle)
            <p class="mt-4 max-w-2xl text-slate-600">{{ $subtitle }}</p>
        @endif
    </div>
</section>
