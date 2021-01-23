@extends('template')

@section('content')

    @auth    

        @if ( Auth::user()->role == 1 )

            @if(session()->has('info1') || session()->has('info2') || session()->has('pseudo'))
                <div class="alert alert-success col-4 text-center" role="alert">
                    {{ session('info1') }}<strong>{{ session('pseudo') }}</strong>{{ session('info2') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="usersInfo">
                <div class="usersBand">
                    @foreach($users as $user)
                        @if( $user->role == 0 )
                            <div id={{ $user->pseudo }} class="userBand">
                                <img class="avatar" src="{{ $user->avatar!=NULL ? asset('uploads/users/' . $user->id . '/' . $user->avatar) : asset('uploads/userDefault.png') }}" alt="Avatar utilisateur"/>
                                <span>{{ $user->pseudo }}</span>
                            </div>
                        @endif
                    @endforeach
                </div>

                @php
                    $k=1;
                @endphp
                @foreach($users as $user)
                    <div class="usersBandInfo card main-card {{ $user->pseudo }} mask text-center">
                        <h3>{{ $user->pseudo }}</h3>
                        <div class="row mr-2 ml-2 mb-4">
                            <div class="col-12 col-lg-6 col-xl-4 mb-3">
                                <div class="row">
                                    <div class="col-12 col-xl-6">
                                        <img class="avatarShow" src="{{ $user->avatar!=NULL ? asset('uploads/users/' . $user->id . '/' . $user->avatar) : asset('uploads/userDefault.png') }}" alt="Avatar utilisateur"/>
                                    </div>
                                    <div class="col-12 col-xl-6">
                                        <p>Inscris depuis le : <span class="calligraf">{!! dateFormat($user->created_at) !!}</span></p>
                                        @php
                                            $userRole = 'Utilisateur';
                                            if( $user->role == 1 ){
                                                $userRole = 'Administrateur';
                                            }
                                        @endphp
                                        <p>Statut : <span class="calligraf">{{ $userRole }}</span></p>
                                        <div>
                                            <span>Banni </span>
                                            <div class="onoffswitch" style="margin: 0 auto;">
                                                <form method="POST" action="{{ route('banUpdate', $user->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="checkbox" value="1" name="myonoffswitch{{ $user->id }}" class="onoffswitch-checkbox" id="myonoffswitch{{ $user->id }}" tabindex="0" @if($user->ban == 1) checked @endif>
                                                    <label class="onoffswitch-label text-left" for="myonoffswitch{{ $user->id }}">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                    <button id="btnBanUpdate{{ $user->id }}" class="button btnBanUpdate mask" type="submit">Confirmer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-xl-8">
                                <div class="row">
                                    <div class="col-12 col-xl-6">
                                        <p>Pseudo : <span class="calligraf">{{ $user->pseudo }}</span></p>
                                        <p class="userEmail">Mail : <span>{{ $user->email }}</span></p>
                                        <p>Nom : <span class="calligraf">{{ $user->name }}</span></p>
                                        <p>Prénom : <span class="calligraf">{{ $user->firstname }}</span></p>
                                    </div>
                            
                                    <div class="col-12 col-xl-6">
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
                                        <p>Téléphone : <span class="calligraf">@if($user->phone != null) 0{{ $user->phone }}@endif</span></p>
                                    </div>
                                </div>
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
                                <div class="card col-12 mb-4">
                                    <div class="card-body">
                                        @if( $reaction->idea_id )
                                            @php
                                                $i=0;
                                            @endphp
                                            @foreach( $ideas as $idea)
                                                @if( $reaction->idea_id == $idea->idea_id && $i < 1)
                                                    <p class="font-weight-bold">Idée {{ $idea->title }}</p>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endif
                                            @endforeach                                    
                                        @elseif( $reaction->travel_id )
                                            @php
                                                $j=0;
                                            @endphp
                                            @foreach( $travels as $travel)
                                                @if( $reaction->travel_id == $travel->travel_id && $j < 1 )
                                                    <p class="font-weight-bold">Voyage {{ $travel->title }} du {{ $travel->date_start }}</p>
                                                    @php
                                                        $j++;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        {{-- <p>Note : {{ $reaction->note }} / 5</p> --}}
                                        <p class="mb-2"><span id="{{$k}}" class="user-note mask">{{ $reaction->note }}</span></p>
                                        <p>{!! lineBreak($reaction->comment) !!}</p>
                                        <p class="card-text">{{ fullDateFormat($reaction->updated_at) }}</p>
                                        {{-- <div class="commentShowBox">
                                            <span>Commentaire :</span>
                                            <div class="commentShow"><p>{!! lineBreak($reaction->comment) !!}</p></div>
                                        </div> --}}
                                        @if( $reaction->idea_id )
                                        <a class="button fas fa-eye fa-lg" href="{{ route('ideas.show', $reaction->idea_id) }}"></a>
                                        @elseif( $reaction->travel_id )
                                        <a class="button fas fa-eye fa-lg" href="{{ route('travels.show', $reaction->travel_id) }}"></a>
                                        @endif
                                        <a class="button" href="{{ route('reactions.edit', $reaction->id) }}">Modifier</a>
                                        <button id="buttonDestroy{{$k}}" class="buttonDestroy button">Supprimer</button>
                                        <form id="formDestroy{{$k}}" class="mask d-inline-block" action="{{ route('reactions.destroy', $reaction->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button" type="submit">Confirmer</button>
                                        </form>
                                    </div>
                                </div>
                                @php
                                    $k++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

        @else
            <p class="stop">&#x26A0;</p>
            <p class="noAccess">Cette page est réservée aux administrateurs.</p>
        @endif
    @else
        <p class="stop">&#x26A0;</p>
        <p class="noAccess">Cette page est réservée aux administrateurs.</p>
    @endauth

@endsection