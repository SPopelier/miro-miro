@extends('layouts.main') 
@section('title', 'Produits triés par nom')

@section('content')
    <h1>Produits triés par nom</h1>

    <ul>
        @foreach ($produits as $produit)
            <li>{{ $produit->nom }} - {{ $produit->prix }} €</li>
        @endforeach
    </ul>
@endsection