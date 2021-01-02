@extends('template')

@section('content')

    <section id="gamesMenu">
        <div class="row">
            <div class="col-md-6">
                <div class="cat-bubble-container">
                    <a href="{{ route('shifumi') }}"><img src="{{ asset('uploads/shifumi-game.jpg') }}" alt="Shifumi"/></a>
                    <a class="cat-bubble" href="{{ route('shifumi') }}">Shifumi</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="cat-bubble-container">
                    <a href="{{ route('snake') }}"><img src="{{ asset('uploads/snake-game.jpg') }}" alt="Snake"/></a>
                    <a class="cat-bubble" href="{{ route('snake') }}">Snake</a>
                </div>
            </div>
        </div>
    </section>

@endsection