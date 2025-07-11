<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Connexion admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Assurez-vous que Bootstrap ou CSS est bien compilé -->
</head>
<body class="bg-light">
    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white p-4 shadow-sm rounded">
                @yield('content')
            </div>
        </div>
    </main>
</body>
</html>
