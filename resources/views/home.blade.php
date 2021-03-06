@extends('template')

@section('content')

    <!-- CAROUSEL -->
    <div id="carouselFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            @foreach( $idea->media as $media )
                <div class="carousel-item @if( $media == $idea->media[0] ) active @endif">
                    <img class="d-block" src="{{ asset('uploads/'.$media->image) }}"
                    alt="{{ $media->image }}">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- ABOUT US -->
    <section id="aboutUs">
        @auth    
			@if ( Auth::user()->role == 1 )
                <a class="button" href="{{ route('ideas.edit', $idea->id) }}">Modifier l'article</a>
            @endif
        @endauth

        <h1>Passion <span class="title-japon">Japon</span><span class="title-point"></span></h1>

        <a href="{{ asset('uploads/'.$idea->image) }}" data-lightbox="{{ $idea->image }}" data-title="Equipe PassionJapon">
            <img src="{{ asset('uploads/'.$idea->image) }}" alt="Photo du groupe"/>
        </a>

        <h3 class="mt-3 mb-5">Présentation du projet :</h3>
        
        <p>{!! lineBreak($idea->description) !!}</p>
    </section>

@endsection