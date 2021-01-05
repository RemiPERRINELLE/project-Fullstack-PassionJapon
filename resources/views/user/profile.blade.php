@extends('template')

@section('content')

    @auth
        @if( Auth::user()->id == $user->id )

            <section class="profile">
                <div class="card main-card">
                    <h4 class="mb-5">Vos informations personnelles</h4>

                    @if(session()->has('info'))
                        <div class="alert alert-success col-4 text-center" role="alert">
                            {{ session('info') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="row mr-2 ml-2">
                        <div class="col-4">
                                <img class="avatarShow profileAvatar" src="{{ $user->avatar!=NULL ? asset('uploads/users/' . $user->id . '/' . $user->avatar) : asset('uploads/userDefault.png') }}" alt="Avatar utilisateur"/>
                        </div>
                        <div class="col-4">
                            <p>Pseudo : <span class="calligraf">{{ $user->pseudo }}</span></p>
                            <p class="userEmail">Mail : <span>{{ $user->email }}</span></p>
                            <p>Nom : <span class="calligraf">{{ $user->name }}</span></p>
                            <p>Prénom : <span class="calligraf">{{ $user->firstname }}</span></p>
                        </div>
                        <div class="col-4">
                            @if( $user->sexe == 'H')
                                <p>Sexe : <span class="calligraf">Homme</span></p>
                            @else
                                <p>Sexe : <span class="calligraf">Femme</span></p>
                            @endif                    
                            @if ( $user->adress != '' )
                                <p>Adresse : <span class="calligraf">{{ $user->adress }} - {{ $user->postal_code }} - {{ $user->city }}</span></p>
                            @else
                                <p>Adresse : <span class="calligraf">{{ $user->city }} - {{ $user->postal_code }}</span></p>
                            @endif
                            <p>Pays : <span class="calligraf">{{ $user->country }}</span></p>
                            <p>Téléphone : <span class="calligraf">@if($user->phone != null) 0{{ $user->phone }}</span>@endif</p>
                        </div>
                    </div>


                    {{-- <p>Pseudo : <span class="calligraf">{{ $user->pseudo }}</span></p>
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
                    <p>Téléphone : <span class="calligraf">@if($user->phone != null) 0{{ $user->phone }}@endif</span></p>     --}}
                    <div class="row mr-2 ml-2">
                        <div class="col-4">
                            <a style="display: block;" class="button buttonCenter" href="{{ route('edit.password', $user->id) }}">Modifier le mot de passe</a>
                        </div>
                        <div class="col-4">
                            <a class="button buttonCenter d-block" href="{{ route('users.edit', $user->id) }}">Modifier les informations</a>
                        </div>
                    </div>
                </div>
            </section>

        @else
            <p class="stop">&#x26A0;</p>
            <p class="noAccess">Vous n'avez pas accès à cette page.</p>
        @endif
    @else
        <p class="stop">&#x26A0;</p>
        <p class="noAccess">Vous n'avez pas accès à cette page.</p>
    @endauth

@endsection