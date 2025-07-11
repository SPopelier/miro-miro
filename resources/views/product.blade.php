@extends('layouts.main')

@section('title', 'Explorer les produits')

@section('content')
<section>
    {{-- Formulaire de tri --}}
    <form method="POST" action="{{ route('product.filtrer') }}" class="w-50 mx-auto mt-5">
        @csrf
        <select name="tri" class="form-select mb-3">
            <option value="nom">Trier par nom</option>
            <option value="prix">Trier par prix</option>
        </select>
        <button type="submit" class="btn btn-dark btn-lg d-block w-100">FILTRER</button>
    </form>

    {{-- Messages flash --}}
    @if(session('message'))
        <div class="alert alert-success text-center mt-3">
            {{ session('message') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-center mt-3">
            {{ session('error') }}
        </div>
    @endif

    {{-- Liste des produits --}}
    <div class="container py-5">
        <div class="d-flex flex-wrap justify-content-center gap-4">
            @foreach($produits as $produit)
                <div class="card background-light mt-5" style="width: 18rem;">
                    <img src="{{ asset('asset/' . $produit->image) }}" class="card-img-top" alt="Image de {{ $produit->nom }}">
                    <div class="card-body">
                        <h2 class="card-title">{{ $produit->nom }}</h2>
                        <p class="card-text">{{ $produit->description }}</p>
                        <p>{{ $produit->prix }} €</p>

                        {{-- Voir la fiche produit --}}
                        <a href="{{ route('productsheet.show', $produit->id) }}" class="btn btn-dark btn-sm">VOIR</a>

                        {{-- Ajouter au panier (POST) --}}
                        <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-dark btn-sm w-100">AJOUTER AU PANIER</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
