@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">📊 Tableau de bord de l’administrateur</h1>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 bg-light border rounded">
                    <h5>Total des produits</h5>
                    <p class="fs-4 fw-bold">{{ $nombreProduits }}</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-light border rounded">
                    <h5>Produits en stock</h5>
                    <p class="fs-4 fw-bold">{{ $produitsStock }}</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-light border rounded">
                    <h5>Dernier produit ajouté</h5>
                    @if ($dernierProduit)
                        <ul class="list-unstyled">
                            <li><strong>Nom :</strong> {{ $dernierProduit->nom }}</li>
                            <li><strong>Prix :</strong> {{ $dernierProduit->prix }} €</li>
                            <li><strong>Stock :</strong> {{ $dernierProduit->stock }}</li>
                        </ul>
                    @else
                        <p>Aucun produit disponible.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('backoffice.create') }}" class="btn btn-success">➕ Ajouter un produit</a>
            <a href="{{ route('backoffice.index') }}" class="btn btn-secondary">📋 Voir tous les produits</a>
        </div>
    </div>
@endsection
