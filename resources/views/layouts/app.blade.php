<!DOCTYPE html>
<html lang="fr">
<head>
    <script>document.documentElement.classList.add('js');</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('dismat.name')) — {{ config('dismat.baseline') }}</title>
    <meta name="description" content="@yield('description', 'DISMAT, distributeur de matériel bureautique et informatique à Dakar, Sénégal : ordinateurs, imprimantes, mobilier de bureau, consommables et services associés.')">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col">

    @include('partials.nav')

    @if (session('success'))
        <div class="container-dismat mt-4" data-auto-dismiss>
            <div class="flex items-start gap-3 rounded-2xl border border-jade-100 bg-jade-50 px-4 py-3.5 text-sm text-jade-700 shadow-soft">
                <svg class="mt-0.5 h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <main class="flex-1">
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
