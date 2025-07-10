{{-- Header personnalisé --}}
@include('structure.header')

<section>
    {{-- Formulaire de tri --}}
    <form method="POST" action="{{ route('product.filtrer') }}" class="w-50 mx-auto mt-5">
        <select name="tri" class="form-select mb-3">
            <option value="nom">Trier par nom</option>
            <option value="prix">Trier par prix</option>
        </select>
        <button type="submit" class="btn btn-dark btn-lg d-block w-100">FILTRER</button>
    </form>

    {{-- Message flash --}}
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
                        <a href="{{ route('product.show', $produit->id) }}" class="btn btn-dark btn-sm float-end">VOIR</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Footer personnalisé --}}
@include('structure.footer')
