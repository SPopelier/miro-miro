@extends('layouts.main')

@section('title', 'Fiche produit')

@section('content')
<div class="container py-5">
    <div class="d-flex flex-wrap justify-content-center gap-4">
        <h1>🛍️ Fiche produit</h1>

        @foreach ($produit as $prod)
            <p>{{ $prod->nom }}</p>
            <img src="{{ asset('asset/' . $prod->image) }}" class="card-img-top" alt="Image de {{ $prod->nom }}">
            <div class="card-body">
                <h2 class="card-title">{{ $prod->nom }}</h2>
                <p class="card-text">{{ $prod->description }}</p>
                <p>{{ $prod->prix }} €</p>

                {{-- Formulaire POST pour ajouter au panier --}}
                <form action="{{ route('panier.ajouter', $prod->id) }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-dark btn-sm w-100">AJOUTER AU PANIER</button>
                </form>
            </div>
        @endforeach
    </div>
</div>

<a href="{{ route('product') }}">⬅️ Retour à la boutique</a>
@endsection
