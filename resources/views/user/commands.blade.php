@extends('template')

@section('content')

    @auth
        @if( Auth::user()->id == $user->id )

            <section class="commands">
                <div class="card main-card">
                    <h4 class="mb-4">Vos commandes</h4>

                    @if(session()->has('info'))
                        <div class="alert alert-success col-4 text-center" role="alert">
                            {{ session('info') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @foreach( $sales as $sale )
                                <div class="card card-command">
                                    <div class="card-body">
                                        @php
                                            $i=0;
                                        @endphp
                                        @foreach( $travels as $travel)
                                            @if( $sale->travel_id == $travel->id && $i < 1 )
                                                <p class="font-weight-bold">Voyage {{ $travel->title }} du {{ dateFormat($travel->date_start) }}</p>
                                                <p><span class="travelPrice">{{ $sale->numberPlaces * $travel->price }}€</span><span class="ml-2"> pour {{ $sale->numberPlaces }} places.</span></p>
                                                <p class="card-text">Commande du {{ fullDateFormat($sale->created_at) }}</p>
                                                {{-- <p>Places achetées : {{ $sale->numberPlaces }}</p> --}}
                                                {{-- <p>Montant : {{$sale->numberPlaces * $travel->price}}€</p> --}}
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

        @else
            <p class="stop">&#x26A0;</p>
            <p class="noAccess">Vous n'avez pas accès à cette page.</p>
        @endif
    @else
        <p class="stop">&#x26A0;</p>
        <p class="noAccess">Vous n'avez pas accès à cette page.</p>
    @endauth


@endsection