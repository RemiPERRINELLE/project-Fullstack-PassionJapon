@extends('template')

@section('content')

    <h2>Le SNAKE</h2>

    <div id="snakeContainer">
        <a id="snakeButton" class="button" href="#canva">Jouer</a>
        <p id="snakeScore">Score : </p>
        <span id="canva"></span>
    </div>

@endsection