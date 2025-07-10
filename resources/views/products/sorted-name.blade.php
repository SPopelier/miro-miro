
  @include('structure.header')
  <h1>Produits triés par nom</h1>

  <ul>
    @foreach ($produits as $produit)
    <li>{{ $produit->nom }} - {{ $produit->prix }} €</li>
    @endforeach
  </ul>
  
  {{-- Footer personnalisé --}}
  @include('structure.footer')
