@extends('layouts.main')

@section('content')

<div class="container">
    <h2>Mon Compte</h2>

    <div class="row">
        <!-- Connexion -->
        <div class="col-md-6">
            <h3>Connexion</h3>

            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form method="POST" action="{{ route('connexion') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
                <input type="password" name="password" placeholder="Mot de passe" class="form-control mb-2" required>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>

        <!-- Inscription -->
        <div class="col-md-6">
            <h3>Inscription</h3>

            @if ($errors->any() && !$errors->has('email'))
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('inscription') }}">
                @csrf
                <input type="text" name="name" placeholder="Nom complet" class="form-control mb-2" required>
                <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
                <input type="password" name="password" placeholder="Mot de passe" class="form-control mb-2" required>
                <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe" class="form-control mb-2" required>
                <button type="submit" class="btn btn-success">S'inscrire</button>
            </form>
        </div>
    </div>
</div>

@endsection
