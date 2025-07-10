@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Bienvenue sur ton dashboard, {{ Auth::user()->name }}!</h2>
    <p>Tu es connecté avec succès.</p>
</div>
@endsection
