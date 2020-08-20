@extends('template')

@section('content')


    @if(session()->has('info'))
        <p>{{ session('info') }}</p>
    @endif

    <section class="comments">
        <div class="card main-card">
            <h4>Vos Commentaires</h4>
            @foreach( $reactions as $reaction )
                        <div class="card card-comment">
                            <div class="card-body">
                                @if( $reaction->idea_id )
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach( $ideas as $idea)
                                        @if( $reaction->idea_id == $idea->id && $i < 1)
                                            <p class="commentSubject">Idée : {{ $idea->title }}</p>
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
                                            <p class="commentSubject">Voyage : {{ $travel->title }} du {{ $travel->date_start }}</p>
                                            @php
                                                $j++;
                                            @endphp
                                        @endif
                                    @endforeach
                                    
                                @endif
                                <div class="noteBox">
                                    <p>{{ $reaction->note }} / 5</p>
                                </div>
                                <p class="card-text">{!! lineBreak($reaction->comment) !!}</p>
							    <p>{{ fullDateFormat($reaction->created_at) }}</p>
                                <a class="button" href="{{ route('reactions.edit', $reaction->id) }}">Modifier</a>
                                <button class="buttonDestroy button">Supprimer</button>
                                <form class="formDestroy mask" action="{{ route('reactions.destroy', $reaction->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button" type="submit">Confirmer</button>
                                </form>
                            </div>
                        </div>
            @endforeach
        </div>
    </section>

@endsection