<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détail du produit</title>
</head>

<body>
    @include('structure.header')
    <h1>Produit : {{ $produit->nom }}</h1>
    <p>Prix : {{ $produit->prix }} €</p>

    {{-- Footer personnalisé --}}
    @include('structure.footer')

</body>

</html>