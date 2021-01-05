@extends('template')

@section('content')
    <section class="article">
        <a href="{{ asset('uploads/'.$article->image) }}" data-lightbox="{{ $article->image }}" data-title="{{ $article->title }}">
            <img src="{{ asset('uploads/'.$article->image) }}" alt="{{ $article->image }}"/>
        </a>
        <h2>{{ $article->title }}</h2>
        <p class="mb-4">{!! lineBreak($article->introduction) !!}</p>
        <p class="mb-4 mt-5">{!! lineBreak($article->description) !!}</p>
        @foreach($article->ideas as $idea)
            <h3 class="mt-5">{{ $idea->title }}</h3>
            <a href="{{ asset('uploads/'.$idea->image) }}" data-lightbox="Images secondaires" data-title="{{ $idea->title }}">
                <img class="mb-4 ideaMedia" src="{{ asset('uploads/'.$idea->image) }}" alt="{{ $idea->image }}"/>
            </a>
            <p class="mb-4">{!! lineBreak($idea->description) !!}</p>
        @endforeach
        <p class="mb-4 mt-5">{!! lineBreak($article->conclusion) !!}</p>
        @auth    
            @if ( Auth::user()->role == 1 )
                <a class="button" href="{{ route('articles.edit', $article->id) }}">Modifier</a>
                <button id="buttonDestroy1" class="buttonDestroy button">Supprimer</button>
                <form id="formDestroy1" class="mask" action="{{ route('articles.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="button" type="submit">Confirmer</button>
                </form>
            @endif
        @endauth
        <a class="button" href="{{ route('articles.index') }}">Retour</a>
    </section>

    

@endsection