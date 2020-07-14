@extends('template')

@section('content')

    @if(session()->has('info'))
        <p>{{ session('info') }}</p>
    @endif

    <p>ID : {{ $user->id }}</p>
    <p>Pseudo : {{ $user->pseudo }}</p>
    <img class="avatar" src="{{ asset('uploads/users/' . $user->id . '/' . $user->avatar) }}" alt="{{ $user->avatar }}"/>
    <p>Nom : {{ $user->name }}</p>
    <p>Prénom : {{ $user->firstname }}</p>
    @if( $user->sexe == 'H')
        <p>Sexe : Homme</p>
    @else
        <p>Sexe : Femme</p>
    @endif
    <p>Email : {{ $user->email }}</p>
    <p>Adresse : {{ $user->adress }}</p>
    <p>Code postal: {{ $user->postal_code }}</p>
    <p>Ville : {{ $user->city }}</p>
    <p>Pays : {{ $user->country }}</p>
    <p>Téléphone : {{ $user->phone }}</p>    

    <a class="button" href="{{ route('users.edit', $user->id) }}">Modifier les informations</a>
    <a class="button" href="{{ route('edit.password', $user->id) }}">Modifier le mot de passe</a>




@endsection