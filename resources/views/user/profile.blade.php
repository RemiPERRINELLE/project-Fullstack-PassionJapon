@extends('template')

@section('content')

    <section class="profile">
        <div class="card main-card">
            <h4>Vos informations personnelles</h4>

            @if(session()->has('info'))
                <p>{{ session('info') }}</p>
            @endif

            <p>Pseudo : <span class="calligraf">{{ $user->pseudo }}</span></p>
            <p>Avatar : <img class="avatar" src="{{ $user->avatar!=NULL ? asset('uploads/users/' . $user->id . '/' . $user->avatar) : asset('uploads/userDefault.png') }}" alt="Avatar utilisateur"/></p>
            <p>Nom : <span class="calligraf">{{ $user->name }}</span></p>
            <p>Prénom : <span class="calligraf">{{ $user->firstname }}</span></p>
            @if( $user->sexe == 'H')
                <p>Sexe : <span class="calligraf">Homme</span></p>
            @else
                <p>Sexe : <span class="calligraf">Femme</span></p>
            @endif
            <p>E-Mail : <span class="calligraf">{{ $user->email }}</span></p>
            <p>Adresse : <span class="calligraf">{{ $user->adress }}</span></p>
            <p>Code postal: <span class="calligraf">{{ $user->postal_code }}</span></p>
            <p>Ville : <span class="calligraf">{{ $user->city }}</span></p>
            <p>Pays : <span class="calligraf">{{ $user->country }}</span></p>
            <p>Téléphone : <span class="calligraf">@if($user->phone != null) 0{{ $user->phone }}@endif</span></p>    

            <a class="button" href="{{ route('users.edit', $user->id) }}">Modifier les informations</a>
            <a class="button" href="{{ route('edit.password', $user->id) }}">Modifier le mot de passe</a>
        </div>
    </section>




@endsection