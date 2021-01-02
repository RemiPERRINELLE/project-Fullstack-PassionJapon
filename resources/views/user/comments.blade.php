@extends('template')

@section('content')


    @if(session()->has('info'))
        <div class="alert alert-success col-4 text-center" role="alert">
            {{ session('info') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="comments">
        <div class="card main-card">
            <h4>Vos Commentaires</h4>
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
                        <button class="buttonDestroy button">Supprimer</button>
                        <form class="formDestroy mask" action="{{ route('reactions.destroy', $reaction->id) }}" method="POST">
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

@endsection