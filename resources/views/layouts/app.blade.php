<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FarmTech MIS - Empowering Farmers Through Collective Strength</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #fcfdfb;
        }
        .font-instrument {
            font-family: 'Instrument Sans', sans-serif;
        }

        .gradient-text {
            background: linear-gradient(135deg, #6b21a8 0%, #d946ef 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
    <!-- Leaflet GIS Map Library -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body class="antialiased">
    <div class="min-h-screen">
        @unless(Request::is('login') || Request::is('register*') || Request::is('farmer/dashboard*') || Request::is('shg/dashboard*') || Request::is('fpo/dashboard*'))
            <x-header />
            <x-navbar />
        @endunless

        <main>
            @yield('content')
        </main>

        @unless(Request::is('login') || Request::is('register*') || Request::is('farmer/dashboard*') || Request::is('shg/dashboard*') || Request::is('fpo/dashboard*'))
            <x-footer />
        @endunless
    </div>
</body>
</html>
