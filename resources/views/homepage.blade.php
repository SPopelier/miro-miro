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

    <div style="height: 100px;"></div> {{-- Espace AVANT le séparateur --}}

    {{-- Séparateur du haut des produits --}}
    <img src="{{ asset('asset/separation_haut.png') }}" alt="séparateur haut" style="width:100%; display:block;">

    {{-- Contenu de la section hero --}}
    <section class="hero-section d-flex align-items-center justify-content-center text-center">
        <div class="container">
            <p class="mb-4">MIRO MIRO propose un large choix de lunettes photochromiques, du design à la vente, incluant des modèles personnalisés.</p>
            <a href="#products" class="btn btn-dark">EXPLORER</a>
        </div>
    </section>

    {{-- Séparateur du bas du hero --}}
    <img src="{{ asset('asset/separation_bas.png') }}" alt="séparateur"
        style="width:100%; display:block; margin-bottom:-1px;">


    {{-- Contenu produits --}}
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

    </section>

    {{-- Contenu Personnaliser --}}

    <section class="w-100 mt-5">

        {{-- Séparateur du haut des produits --}}
        <img src="{{ asset('asset/separation_haut.png') }}" alt="séparateur haut" style="width:100%; display:block;">

        <div class="bg-miro-color d-flex flex-column justify-content-center align-items-center p-4">
            <p class="text-center mb-3">Vous souhaitez personnaliser vos lunettes ? Vous pouvez le faire ne ligne avec notre sélécteur en sélectionnant parmi différentes formes, couleurs et styles.</p>
            <button class="btn btn-light fw-bold">JE VEUX</button>
        </div>

        {{-- Séparateur du bas du header --}}
        <div class="mb-5">
            <img src="{{ asset('asset/separation_bas.png') }}" alt="séparateur"
                style="width:100%; display:block; margin-bottom:-1px;">
        </div>
    </section>

    {{-- Contenu  Avantages clients --}}

    <section class="container text-center background-light">
        <div class="row justify-content-center">
            <div class="col-10 col-md-6 mt-5">
                <img src="{{ asset('asset/lunettes.png') }}" alt="image de lunettes" class="img-fluid mb-3">
                <h2>Verres adaptifs intelligents</h2>
                <p>Nos verres photochromiques s'adaptent instantanément à la lumière ambiante pour offrir un confort visuel optimal — que vous soyez à vélo, en ville ou à la plage.</p>
                <button class="btn btn-dark btn-sm">EXPLORER</button>
            </div>
            <div class="col-10 col-md-6 mt-5">
                <img src="{{ asset('asset/commande.png') }}" alt="image de lunettes" class="img-fluid mb-3">
                <h2>Lunettes 100% personnalisables</h2>
                <p>Montures sport, urbaines ou décontractées, à vous de créer la paire qui vous ressemble. Couleur, forme, verres, tout est personnalisable.</p>
                <button class="btn btn-dark btn-sm">EN SAVOIR PLUS</button>
            </div>
            <div class="col-10 col-md-6 mt-5">
                <img src="{{ asset('asset/colis.png') }}" alt="image de lunettes" class="img-fluid mb-3">
                <h2>Suivi facile & livraison rapide</h2>
                <p>Suivi de commande instantané depuis votre espace client. Expédition rapide dans toute la France.</p>
                <button class="btn btn-dark btn-sm">SUIVRE MA COMMANDE</button>
            </div>
        </div>
    </section>

    {{-- Footer personnalisé --}}
    @include('structure.footer')



    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>