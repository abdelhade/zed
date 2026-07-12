<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ __('home.meta.description') }}">
    <title>{{ __('home.meta.title') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@400;500;600;700;800&family=Montserrat:wght@400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="site-body">
    <div class="noise" aria-hidden="true"></div>
    <div class="grid-overlay" aria-hidden="true" data-parallax="-0.15"></div>

    @include('partials.nav')

    <main>
        @yield('content')
    </main>

    {{-- Footer lives inside zig-zag path on homepage --}}
    @hasSection('standalone_footer')
        @include('partials.footer')
    @endif
</body>
</html>
