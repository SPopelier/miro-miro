@extends('layouts.backoffice')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Tableau de bord</h1>

    {{-- Statistiques rapides --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Produits</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $nombreProduits }} produit(s)</h5>
                    <p class="card-text">Nombre total de produits enregistrés</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Stock suffisant</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $produitsStock }} en stock</h5>
                    <p class="card-text">Produits actuellement disponibles</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Ajout récent</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $dernierProduit->nom ?? 'Aucun' }}</h5>
                    <p class="card-text">Dernier produit ajouté</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Actions rapides --}}
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('product.create') }}" class="btn btn-dark w-100 mb-3">➕ Ajouter un produit</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('product.index') }}" class="btn btn-outline-dark w-100 mb-3">📝 Gérer les produits</a>
        </div>
    </div>
</div>
@endsection
