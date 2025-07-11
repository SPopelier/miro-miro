@extends('backoffice.backoffice')

@section('title', 'Ajouter un produit')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">➕ Ajouter un nouveau produit</h2>

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

        <form action="{{ route('backoffice.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label">Nom du produit</label>
                <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom') }}" required>
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Prix (€)</label>
                <input type="number" name="prix" class="form-control" id="prix" value="{{ old('prix') }}" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" id="stock" value="{{ old('stock') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Créer le produit</button>
            <a href="{{ route('backoffice.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
