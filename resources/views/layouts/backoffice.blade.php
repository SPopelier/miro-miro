<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Backoffice')</title>

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Ton fichier CSS --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body class="bg-light">

    {{-- Header (depuis layouts, pas structure) --}}
    @include('layouts.header')

    {{-- Contenu principal --}}
    <main class="container py-5">
        @yield('content')
    </main>

    {{-- Footer (depuis layouts aussi) --}}
    @include('layouts.footer')

    {{-- Scripts Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
