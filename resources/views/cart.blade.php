@extends('layouts.main')

@section('title', 'Mon panier')

@section('content')
    <h1>🛒 Mon panier</h1>

    @if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif


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

        <form method="POST" action="{{ route('panier.retirer', $produit->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Retirer du panier</button>
</form>



    @else
        <p>Votre panier est vide.</p>
    @endif

    <a href="{{ route('product') }}">⬅️ Retour à la boutique</a>
@endsection
