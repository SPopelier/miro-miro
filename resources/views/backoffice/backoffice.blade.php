<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Backoffice')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    {{-- Header --}}
    @include('layouts.header')

    {{-- Barre admin spécifique --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="{{ route('backoffice.dashboard') }}">🛠 Backoffice</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('backoffice.index') }}">📋 Produits</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger ms-3">Se déconnecter</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    {{-- Contenu principal --}}
    <main class="container mt-5">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')
</body>
</html>
