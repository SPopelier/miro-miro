<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>

    {{-- Header personnalisé --}}
    @include('structure.header')

    <div style="height: 150px;"></div> {{-- Espace AVANT le séparateur --}}

    {{-- Séparateur du haut des produits --}}
    <img src="{{ asset('asset/separation_haut.png') }}" alt="séparateur haut" style="width:100%; display:block;">

    {{-- Contenu de la page --}}
    <section class="hero">
        <div class="container text-center text-white d-flex flex-column justify-content-center align-items-center"
            style="min-height: 60vh;">
            <h1 class="mb-4">Bienvenue chez <span>MIRO MIRO</span></h1>
            <a href="#products" class="btn btn-dark">EXPLORER</a>
        </div>
    </section>

    {{-- Séparateur du bas du header --}}
    <img src="{{ asset('asset/separation_bas.png') }}" alt="séparateur"
        style="width:100%; display:block; margin-bottom:-1px;">


   <section id="products" class="container py-5">
    <h2 class="mb-4">Nos produits tendances</h2>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @for ($i = 0; $i < 6; $i++)
            <div class="col">
                <div class="product-card d-flex align-items-center gap-3 p-3 border rounded bg-miro-color">
                    {{-- Image du produit --}}
                    <img src="{{ asset('asset/produit1.png') }}" alt="Lunettes Lorem"
                         style="height: 80px; width: auto; object-fit: contain;">
                    
                    {{-- Infos produit --}}
                    <div class="flex-grow-1">
                        <p class="mb-1">Lorem</p>
                        <p class="fw-bold">19€</p>
                    </div>

                    {{-- Bouton --}}
                    <button class="btn btn-dark btn-sm">VOIR</button>
                </div>
            </div>
        @endfor
    </div>

    <p class="mt-4">Des montures stylées, accessibles et personnalisables.</p>
    <a href="/product" class="btn-hero">Découvrir nos produits</a>
</section>


        <p class="mt-4">Des montures stylées, accessibles et personnalisables.</p>
        <a href="/product" class="btn-hero">Découvrir nos produits</a>
    </section>

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>