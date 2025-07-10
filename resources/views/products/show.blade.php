@extends('layouts.main') 

@section('title', 'Détails du produit')

@section('content')
    <h1>Produit : {{ $produit->nom }}</h1>
    <p>Prix : {{ $produit->prix }} €</p>
@endsection