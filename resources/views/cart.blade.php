@extends('layouts.main')

@section('title', 'Mon panier')

@section('content')
    <h1>🛒 Mon panier</h1>

    @if(Auth::user()->panier && Auth::user()->panier->products->count() > 0)
        <ul>
            @foreach(Auth::user()->panier->products as $produit)
                <li>
                    <strong>{{ $produit->nom }}</strong><br>
                    Prix : {{ $produit->prix }} €<br>
                    Stock : {{ $produit->stock }}
                </li>
            @endforeach
        </ul>
    @else
        <p>Votre panier est vide.</p>
    @endif

    <a href="{{ route('product') }}">⬅️ Retour à la boutique</a>
@endsection
