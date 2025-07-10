
  @include('structure.header')
  <h1>Produits triés par prix croissant</h1>

  <p>Nombre de produits : {{ count($produits) }}</p>

  <ul>
    @foreach ($produits as $produit)
    <li>{{ $produit->nom }} - {{ $produit->prix }} €</li>
    @endforeach
  </ul>

  {{-- Footer personnalisé --}}
  @include('structure.footer')
