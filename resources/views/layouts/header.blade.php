<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MIRO MIRO</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>


<body>
<header class="navbar navbar-expand-lg bg-miro-color py-3 position-relative">
  <div class="container d-flex justify-content-between align-items-center">

    <!-- Logo -->
    <a class="navbar-brand" href="#">
      <img src="{{ asset('asset/logonoir.png') }}" alt="Logo Miro Miro" height="50">
    </a>

    <!-- Burger -->
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu (masqué sur mobile) -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
      <ul class="navbar-nav gap-4">
        <li class="nav-item"><a class="nav-link" href="{{ route('homepage') }}">Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('product') }}">Explorer</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('productsheet') }}">Personnaliser</a></li>
        <!--<li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>-->
      </ul>
    </div>
  </div>

</header>