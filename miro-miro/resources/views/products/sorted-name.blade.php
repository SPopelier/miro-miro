<!-- resources/views/products/sorted-name.blade.php -->


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Test tri par nom</title>
</head>

<body>
  @include('structure.header')
  <h1>Produits triés par nom</h1>

  <ul>
    @foreach ($produits as $produit)
    <li>{{ $produit->nom }} - {{ $produit->prix }} €</li>
    @endforeach
  </ul>
  
  {{-- Footer personnalisé --}}
  @include('structure.footer')
</body>

</html>