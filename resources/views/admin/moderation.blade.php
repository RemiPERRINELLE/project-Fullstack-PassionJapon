@extends('template')

@section('content')
    @if( isAdmin() )
        @if(session()->has('info'))
            <p>{{ session('info') }}</p>
        @endif
        <div class="usersInfo">
            <div class="usersBand">
                @foreach($users as $user)
                    <div id={{ $user->pseudo }} class="userBand">
                        <img class="avatar avatarModeration" src="{{ asset('uploads/users/' . $user->id . '/' . $user->avatar) }}" alt="{{ $user->avatar }}"/>
                        <span class="userModeration">{{ $user->pseudo }}</span>
                    </div>
                @endforeach
            </div>
            @foreach($users as $user)
                <div class="usersBandInfo card main-card {{ $user->pseudo }} mask">
                    <div class="row mr-2 ml-2">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <img class="avatarShow" src="{{ asset('uploads/users/' . $user->id . '/' . $user->avatar) }}" alt="{{ $user->avatar }}"/>
                                    <p class="text-center">{{ $user->pseudo }}</p>
                                </div>
                                <div class="col-6">
                                    <p>Inscris depuis le : <span>{!! dateFormat($user->created_at) !!}</span></p>
                                    @php
                                        $userRole = 'Utilisateur';
                                        if( $user->role == 1 ){
                                            $userRole = 'Administrateur';
                                        }
                                    @endphp
                                    <p>Statut : {{ $userRole }}</p>
                                    <div style=" display:flex;">
                                        <span>Banni :</span>
                                        <div class="onoffswitch" id="{{ $user->id }}" style="margin-left: 0.5rem;">
                                            {{-- @if( $user->ban == 0 ) --}}
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch{{ $user->id }}" tabindex="0" @if($user->ban == 1) checked @endif>
                                            {{-- @else
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox checked" id="myonoffswitch{{ $user->id }}" tabindex="0" checked>
                                            @endif --}}
                                            <label class="onoffswitch-label" for="myonoffswitch{{ $user->id }}">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('banUpdate', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button id="btnBanUpdate{{ $user->id }}" class="button btnBanUpdate mask" type="submit">Confirmer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <p>Pseudo : {{ $user->pseudo }}</p>
                            <p class="userEmail">Mail : {{ $user->email }}</p>
                            <p>Nom : {{ $user->name }}</p>
                            <p>Prénom : {{ $user->firstname }}</p>
                        </div>
                        <div class="col-4">
                            <p>Sexe : {{ $user->sexe }}</p>
                            @if ( $user->adress != '' )
                                <p>Adresse : {{ $user->adress }} - {{ $user->postal_code }} - {{ $user->city }}</p>
                            @else
                            <p>Adresse : {{ $user->city }} - {{ $user->postal_code }}</p>
                            @endif
                            <p>Pays : {{ $user->country }}</p>
                            <p>Téléphone : {{ $user->phone }}</p>
                        </div>
                    </div>
                    <h4>Commentaires</h4>
                    <div class="row mr-2 ml-2">
                        
                        @php
                            $reactions = App\Reaction::where('reactions.user_id', $user->id)->get();
                            $ideas = App\Reaction::where('reactions.user_id', $user->id)->join('ideas', 'reactions.idea_id', '=', 'ideas.id')->get();
                            $travels = App\Reaction::where('reactions.user_id', $user->id)->join('travels', 'reactions.travel_id', '=', 'travels.id')->join('categories', 'travels.category_id', '=', 'categories.id')->get();
                        @endphp
                        @foreach( $reactions as $reaction )
                            <div class="card col-12">
                                <div class="card-body">
                                    @if( $reaction->idea_id )
                                        @php
                                            $i=0;
                                        @endphp
                                        @foreach( $ideas as $idea)
                                            @if( $reaction->idea_id == $idea->id && $i < 1)
                                                <p>Concernant l'idée {{ $idea->title }}</p>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endif
                                        @endforeach                                    
                                    @elseif( $reaction->travel_id )
                                        @php
                                            $i=0;
                                        @endphp
                                        @foreach( $travels as $travel)
                                            @if( $reaction->travel_id == $travel->id && $i < 1 )
                                                <p>Concernant le voyage {{ $travel->title }} du {{ $travel->date_start }}</p>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                    <p>Note : {{ $reaction->note }} / 5</p>
                                    <div class="commentShowBox">
                                        <span>Commentaire : </span>
                                        <div class="commentShow"><p>{!! lineBreak($reaction->comment) !!}</p></div>
                                    </div>
                                    @if( $reaction->idea_id )
                                    <a class="button fas fa-eye fa-lg" href="{{ route('ideas.show', $reaction->idea_id) }}"></a>
                                    @elseif( $reaction->travel_id )
                                    <a class="button fas fa-eye fa-lg" href="{{ route('travels.show', $reaction->travel_id) }}"></a>
                                    @endif
                                    <a class="button" href="{{ route('reactions.edit', $reaction->id) }}">Modifier</a>
                                    <a class="button" href="{{ route('reactions.destroy', $reaction->id) }}">Supprimer</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Cette page est réservée aux administrateurs.</p>
    @endif
@endsection