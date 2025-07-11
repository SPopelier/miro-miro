@extends('backoffice.backoffice')

@section('title', 'Modifier un produit')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">✏️ Modifier le produit : {{ $produit->nom }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erreur :</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('backoffice.update', $produit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom" class="form-label">Nom du produit</label>
                <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom', $produit->nom) }}" required>
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Prix (€)</label>
                <input type="number" name="prix" class="form-control" id="prix" value="{{ old('prix', $produit->prix) }}" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" id="stock" value="{{ old('stock', $produit->stock) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">💾 Enregistrer</button>
            <a href="{{ route('backoffice.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
