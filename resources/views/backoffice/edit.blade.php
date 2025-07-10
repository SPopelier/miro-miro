<form action="{{ route('backoffice.update', $produit->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nom" value="{{ $produit->nom }}" class="form-control">
    <input type="number" name="prix" value="{{ $produit->prix }}" class="form-control">
    <input type="text" name="description" value="{{ $produit->description }}" class="form-control">
    <input type="number" name="stock" value="{{ $produit->stock }}" class="form-control">

    <button type="submit" class="btn btn-success">Mettre à jour</button>

    </form>

    <form action="{{ route('backoffice.destroy', $produit->id) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?')">
    @csrf
    @method('DELETE')
    <button type="submit">Supprimer</button>

</form>
