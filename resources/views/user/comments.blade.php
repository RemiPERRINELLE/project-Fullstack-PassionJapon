@extends('template')

@section('content')

    @auth
        @if( Auth::user()->id == $user->id && $user->role == 0 )

            <section class="comments">
                <div class="card main-card">
                    <h4 class="mb-4">Vos commentaires</h4>

                    @if(session()->has('info'))
                        <div class="alert alert-success col-4 text-center" role="alert">
                            {{ session('info') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @php
                        $k=1;
                    @endphp
                    @foreach( $reactions as $reaction )
                        <div class="card card-comment">
                            <div class="card-body">
                                @if( $reaction->idea_id )
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach( $ideas as $idea)
                                        @if( $reaction->idea_id == $idea->id && $i < 1)
                                            <p class="font-weight-bold">Idée : {{ $idea->title }}</p>
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
                                        @if( $reaction->travel_id == $travel->id && $j < 1 )
                                            <p class="font-weight-bold">Voyage : {{ $travel->title }} du {{ $travel->date_start }}</p>
                                            @php
                                                $j++;
                                            @endphp
                                        @endif
                                    @endforeach
                                    
                                @endif
                                <p class="mb-2"><span id="{{$k}}" class="user-note mask">{{ $reaction->note }}</span></p>
                                <p>{!! lineBreak($reaction->comment) !!}</p>
                                <p class="card-text">{{ fullDateFormat($reaction->updated_at) }}</p>
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