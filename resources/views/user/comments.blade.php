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
                                    <div class="commentShow">{!! lineBreak($reaction->comment) !!}</div>
                                </div>
                                <a class="button" href="{{ route('reactions.edit', $reaction->id) }}">Modifier</a>
                            </div>
                        </div>
            @endforeach
        </div>
    </section>

@endsection