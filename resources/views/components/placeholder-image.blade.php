@props(['label' => '', 'class' => 'aspect-[4/3]'])

<div {{ $attributes->merge(['class' => $class.' relative flex items-center justify-center overflow-hidden rounded-md bg-brand-700']) }}>
    <div class="relative flex flex-col items-center gap-2 px-4 text-center">
        <span class="flex h-12 w-12 items-center justify-center rounded-md bg-white/10 text-white">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3 20.25h18a1.5 1.5 0 0 0 1.5-1.5V5.25a1.5 1.5 0 0 0-1.5-1.5H3a1.5 1.5 0 0 0-1.5 1.5v13.5a1.5 1.5 0 0 0 1.5 1.5Z" />
            </svg>
        </span>
        @if ($label)
            <span class="text-xs font-semibold uppercase tracking-wide text-white/80">{{ $label }}</span>
        @endif
    </div>
</div>
