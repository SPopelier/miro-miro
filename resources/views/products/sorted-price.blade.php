@extends('layouts.main') 

@section('title', 'Produits triés par prix croissant')


@section('content')
  <h1>Produits triés par prix croissant</h1>

  <p>Nombre de produits : {{ count($produits) }}</p>

  <ul>
    @foreach ($produits as $produit)
    <li>{{ $produit->nom }} - {{ $produit->prix }} €</li>
    @endforeach
  </ul>
@endsection
