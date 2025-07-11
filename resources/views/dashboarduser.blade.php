@extends('layouts.main')

@section('content')
    <h1>👤 Tableau de bord utilisateur</h1>

    <p>Bienvenue, {{ Auth::user()->name ?? 'invité' }} !</p>

    <ul>
        <li><a href="{{ route('product') }}">🛍️ Voir les produits</a></li>
        <li><a href="{{ route('mon-compte') }}">⚙️ Mon compte</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">🚪 Déconnexion</button>
            </form>
        </li>
    </ul>
@endsection
