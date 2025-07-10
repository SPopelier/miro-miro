    @include('structure.header')
    <h1>Produit : {{ $produit->nom }}</h1>
    <p>Prix : {{ $produit->prix }} €</p>

    {{-- Footer personnalisé --}}
    @include('structure.footer')

