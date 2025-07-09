    <!doctype html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Page</title>

        {{-- CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('style.css') }}">
    </head>

    <body>

        {{-- Header personnalisé --}}
        @include('structure.header')

        <section>
            <div>
                {{-- Bouton --}}
                <button class="btn btn-dark btn-lg mt-5 d-block mx-auto w-50">FILTRER</button>
            </div>

            <div class="container py-5">
                <div class="d-flex flex-wrap justify-content-center gap-4">
                    @foreach($produits as $produit)
                    <div class="card background-light mt-5" style="width: 18rem;">
                        <img src="{{ asset('asset/' . $produit->image) }}" class="card-img-top" alt="Image de {{ $produit->nom }}">


                        <div class="card-body">
                            <h2 class="card-title">{{ $produit->nom }}</h2>
                            <p class="card-text">{{ $produit->description }}</p>
                            <p>{{ $produit->prix }} €</p>
                            <button class="btn btn-dark btn-sm float-end">VOIR</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </section>

        {{-- Footer personnalisé --}}
        @include('structure.footer')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    </body>