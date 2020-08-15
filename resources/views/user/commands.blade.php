@extends('template')

@section('content')

    @if(session()->has('info'))
        <p>{{ session('info') }}</p>
    @endif

    <section class="comments">
        <div class="card main-card">
            <h4>Vos commandes</h4>
            @foreach( $sales as $sale )
                        <div class="card card-comment">
                            <div class="card-body">
                                {{-- @php
                                    $i=0;
                                @endphp --}}
                                @foreach( $travels as $travel)
                                    {{-- @if( $sale->travel_id == $travel->travel_id && $i < 1 )
                                        <p>Concernant le voyage {{ $travel->title }} du {{ $travel->date_start }}</p>
                                        @php
                                            $i++;
                                        @endphp
                                    @endif --}}
                                @endforeach
                                <p>Concernant le voyage {{ $travel->title }} du {{ $travel->date_start }}</p>
                                <p>{{$sale->numberPlaces}}</p>
                                <p>Montant : {{$sale->numberPlaces * $travel->price}}</p>
                                <p>{{$travel->price}}</p>
                            </div>
                        </div>
            @endforeach
        </div>
    </section>


@endsection