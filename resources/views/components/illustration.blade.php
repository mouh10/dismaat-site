@props(['type', 'key' => null, 'class' => 'aspect-[4/3]'])

@php
    $slug = $key;
@endphp

<div {{ $attributes->merge(['class' => $class.' relative overflow-hidden rounded-md bg-brand-50']) }}>
    <svg class="absolute inset-0 h-full w-full" viewBox="0 0 400 300" preserveAspectRatio="xMidYMid slice" role="img" aria-hidden="true">
        <rect width="400" height="300" fill="#EEF2F7" />

        @switch($type)

            {{-- ============ CATÉGORIES / PRODUITS ============ --}}
            @case('category')
                @switch($slug)

                    @case('informatique')
                        {{-- Écran + portable --}}
                        <rect x="150" y="70" width="150" height="98" rx="6" fill="#13294B" />
                        <rect x="162" y="82" width="126" height="70" rx="2" fill="#33507A" />
                        <rect x="60" y="110" width="4" height="4" fill="#C9A24A" />
                        <rect x="210" y="168" width="30" height="10" fill="#0D1E38" />
                        <rect x="190" y="178" width="70" height="8" rx="2" fill="#0D1E38" />
                        <path d="M70 210 L330 210 L316 176 L84 176 Z" fill="#13294B" />
                        <rect x="96" y="186" width="208" height="4" rx="2" fill="#C9A24A" />
                        <rect x="96" y="196" width="150" height="4" rx="2" fill="#8FA3C0" />
                        <circle cx="278" cy="98" r="4" fill="#C9A24A" />
                        <rect x="176" y="96" width="90" height="4" rx="2" fill="#B7C4D9" opacity="0.7" />
                        <rect x="176" y="108" width="60" height="4" rx="2" fill="#B7C4D9" opacity="0.7" />
                        @break

                    @case('bureautique')
                        {{-- Imprimante --}}
                        <rect x="120" y="120" width="160" height="80" rx="8" fill="#13294B" />
                        <rect x="140" y="90" width="120" height="40" rx="4" fill="#33507A" />
                        <rect x="145" y="150" width="110" height="14" rx="2" fill="#0D1E38" />
                        <circle cx="255" cy="157" r="4" fill="#C9A24A" />
                        <rect x="150" y="196" width="100" height="60" fill="#FFFFFF" />
                        <rect x="150" y="196" width="100" height="60" fill="none" stroke="#B7C4D9" stroke-width="2" />
                        <rect x="162" y="210" width="76" height="4" rx="2" fill="#8FA3C0" />
                        <rect x="162" y="222" width="76" height="4" rx="2" fill="#8FA3C0" />
                        <rect x="162" y="234" width="50" height="4" rx="2" fill="#C9A24A" />
                        @break

                    @case('mobilier-de-bureau')
                    @case('mobilier')
                        {{-- Bureau + chaise --}}
                        <rect x="90" y="150" width="180" height="10" rx="2" fill="#13294B" />
                        <rect x="100" y="160" width="8" height="60" fill="#0D1E38" />
                        <rect x="252" y="160" width="8" height="60" fill="#0D1E38" />
                        <rect x="170" y="160" width="60" height="30" fill="#33507A" opacity="0.5" />
                        <path d="M290 170 q0 -22 22 -22 q22 0 22 22 l0 46 l-14 0 l0 -30 l-16 0 l0 30 l-14 0 Z" fill="#C9A24A" />
                        <rect x="298" y="216" width="6" height="26" fill="#0D1E38" />
                        <rect x="326" y="216" width="6" height="26" fill="#0D1E38" />
                        <circle cx="130" cy="120" r="16" fill="#13294B" opacity="0.15" />
                        <circle cx="130" cy="120" r="10" fill="#13294B" opacity="0.25" />
                        @break

                    @case('consommables')
                        {{-- Toners + ramette de papier --}}
                        <rect x="90" y="170" width="60" height="80" rx="4" fill="#13294B" />
                        <rect x="160" y="150" width="60" height="100" rx="4" fill="#33507A" />
                        <rect x="230" y="180" width="60" height="70" rx="4" fill="#0D1E38" />
                        <rect x="96" y="180" width="48" height="10" fill="#C9A24A" />
                        <rect x="166" y="160" width="48" height="10" fill="#C9A24A" />
                        <rect x="236" y="190" width="48" height="10" fill="#C9A24A" />
                        <rect x="120" y="250" width="150" height="14" fill="#FFFFFF" stroke="#B7C4D9" stroke-width="2" />
                        <rect x="126" y="240" width="138" height="14" fill="#FFFFFF" stroke="#B7C4D9" stroke-width="2" />
                        @break

                    @case('reseaux-securite')
                    @case('reseaux')
                        {{-- Switch réseau + caméra --}}
                        <rect x="110" y="140" width="180" height="44" rx="6" fill="#13294B" />
                        @for ($i = 0; $i < 6; $i++)
                            <rect x="{{ 126 + $i * 26 }}" y="160" width="14" height="10" fill="{{ $i === 2 ? '#C9A24A' : '#5A7297' }}" />
                        @endfor
                        <circle cx="120" cy="150" r="3" fill="#C9A24A" />
                        <path d="M150 100 q50 -30 100 0" fill="none" stroke="#8FA3C0" stroke-width="3" />
                        <path d="M165 112 q35 -20 70 0" fill="none" stroke="#8FA3C0" stroke-width="3" />
                        <circle cx="200" cy="100" r="5" fill="#13294B" />
                        <rect x="255" y="190" width="46" height="28" rx="4" fill="#0D1E38" />
                        <circle cx="278" cy="204" r="8" fill="#33507A" />
                        <circle cx="278" cy="204" r="4" fill="#C9A24A" />
                        @break

                    @case('onduleurs-energie')
                    @case('onduleurs')
                        {{-- Onduleur + éclair --}}
                        <rect x="150" y="90" width="90" height="150" rx="8" fill="#13294B" />
                        <rect x="164" y="106" width="62" height="34" rx="3" fill="#33507A" />
                        <circle cx="178" cy="123" r="4" fill="#5FBE8A" />
                        <circle cx="196" cy="123" r="4" fill="#C9A24A" />
                        @for ($i = 0; $i < 3; $i++)
                            <rect x="164" y="{{ 154 + $i * 14 }}" width="62" height="6" rx="2" fill="#5A7297" />
                        @endfor
                        <path d="M204 60 L182 108 L200 108 L188 150 L226 96 L206 96 Z" fill="#C9A24A" />
                        @break

                    @default
                        <rect x="140" y="100" width="120" height="100" rx="8" fill="#13294B" />
                        <circle cx="200" cy="150" r="26" fill="#C9A24A" />
                @endswitch
                @break

            {{-- ============ À PROPOS ============ --}}
            @case('about')
                {{-- Silhouette d'immeubles / quartier des affaires de Dakar --}}
                <rect x="0" y="210" width="400" height="90" fill="#DCE3ED" />
                <rect x="30" y="140" width="50" height="120" fill="#13294B" />
                <rect x="90" y="170" width="42" height="90" fill="#33507A" />
                <rect x="140" y="110" width="58" height="150" fill="#0D1E38" />
                <rect x="206" y="160" width="46" height="100" fill="#33507A" />
                <rect x="260" y="130" width="52" height="130" fill="#13294B" />
                <rect x="320" y="180" width="40" height="80" fill="#5A7297" />
                @for ($i = 0; $i < 3; $i++)
                    @for ($j = 0; $j < 5; $j++)
                        <rect x="{{ 148 + $i * 16 }}" y="{{ 122 + $j * 24 }}" width="8" height="10" fill="#C9A24A" opacity="0.85" />
                    @endfor
                @endfor
                <circle cx="330" cy="70" r="26" fill="#C9A24A" opacity="0.9" />
                <rect x="0" y="298" width="400" height="2" fill="#B7C4D9" />
                @break

            {{-- ============ ARTICLES / ACTUALITÉS ============ --}}
            @case('article')
                @switch($slug % 4)

                    @case(0)
                        {{-- Nouveau stock : caisses de livraison --}}
                        <rect width="400" height="300" fill="#EEF2F7" />
                        <rect x="70" y="170" width="90" height="80" fill="#C9A24A" />
                        <rect x="70" y="170" width="90" height="16" fill="#8A6D1F" />
                        <rect x="180" y="140" width="100" height="110" fill="#13294B" />
                        <rect x="180" y="140" width="100" height="18" fill="#0D1E38" />
                        <rect x="220" y="160" width="20" height="20" fill="#C9A24A" />
                        <rect x="300" y="190" width="70" height="60" fill="#33507A" />
                        <rect x="300" y="190" width="70" height="14" fill="#13294B" />
                        @break

                    @case(1)
                        {{-- Conseils maintenance : presse-papier + outil --}}
                        <rect width="400" height="300" fill="#EEF2F7" />
                        <rect x="150" y="90" width="100" height="140" rx="6" fill="#FFFFFF" stroke="#B7C4D9" stroke-width="3" />
                        <rect x="178" y="80" width="44" height="18" rx="4" fill="#13294B" />
                        @for ($i = 0; $i < 5; $i++)
                            <rect x="168" y="{{ 118 + $i * 18 }}" width="{{ $i == 2 ? 40 : 64 }}" height="6" rx="2" fill="{{ $i < 3 ? '#C9A24A' : '#B7C4D9' }}" />
                            <circle cx="160" cy="{{ 121 + $i * 18 }}" r="3" fill="#13294B" />
                        @endfor
                        <path d="M270 210 l30 -30 l14 14 l-30 30 Z" fill="#13294B" />
                        <circle cx="308" cy="176" r="12" fill="none" stroke="#13294B" stroke-width="6" />
                        @break

                    @case(2)
                        {{-- Partenariat : deux badges reliés --}}
                        <rect width="400" height="300" fill="#EEF2F7" />
                        <circle cx="150" cy="160" r="55" fill="#13294B" />
                        <circle cx="250" cy="160" r="55" fill="#33507A" />
                        <path d="M120 160 l20 20 l40 -46" fill="none" stroke="#C9A24A" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M220 160 l20 20 l40 -46" fill="none" stroke="#EEF2F7" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" />
                        <rect x="170" y="155" width="60" height="10" rx="5" fill="#C9A24A" />
                        @break

                    @default
                        {{-- Aménagement mobilier --}}
                        <rect width="400" height="300" fill="#EEF2F7" />
                        <rect x="110" y="170" width="180" height="12" rx="2" fill="#13294B" />
                        <rect x="118" y="182" width="8" height="50" fill="#0D1E38" />
                        <rect x="274" y="182" width="8" height="50" fill="#0D1E38" />
                        <path d="M300 170 q0 -20 20 -20 q20 0 20 20 l0 42 l-12 0 l0 -26 l-16 0 l0 26 l-12 0 Z" fill="#C9A24A" />
                        <circle cx="150" cy="220" r="14" fill="#5FBE8A" opacity="0.9" />
                        <rect x="144" y="210" width="12" height="24" fill="#33507A" />
                @endswitch
                @break

        @endswitch
    </svg>
</div>
