@extends('backoffice.backoffice')

@section('title', 'Liste des produits')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">📋 Tous les produits</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('backoffice.create') }}" class="btn btn-success mb-3">➕ Ajouter un produit</a>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prix (€)</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produits as $produit)
                    <tr>
                        <td>{{ $produit->id }}</td>
                        <td>{{ $produit->nom }}</td>
                        <td>{{ $produit->prix }}</td>
                        <td>{{ $produit->stock }}</td>
                        <td>
                            <a href="{{ route('backoffice.edit', $produit->id) }}" class="btn btn-sm btn-primary">✏️ Modifier</a>
                            <form action="{{ route('backoffice.destroy', $produit->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Supprimer ce produit ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Aucun produit trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
