@extends('template')

@section('content')

    @if(session()->has('info'))
        <p>{{ session('info') }}</p>
    @endif

    <section class="commands">
        <div class="card main-card">
            <h4>Vos commandes</h4>
            @foreach( $sales as $sale )
                        <div class="card card-command">
                            <div class="card-body">
                                @php
                                    $i=0;
                                @endphp
                                @foreach( $travels as $travel)
                                    @if( $sale->travel_id == $travel->id && $i < 1 )
                                        <p>Concernant le voyage {{ dateFormat($travel->title) }} du {{ dateFormat($travel->date_start) }}</p>
                                        <p>Places achetées : {{$sale->numberPlaces}}</p>
                                        <p>Montant : {{$sale->numberPlaces * $travel->price}}€</p>
                                        @php
                                            $i++;
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
            @endforeach
        </div>
    </section>


@endsection