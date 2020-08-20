@extends('template')

@section('content')
    <section class="article">
        <img src="{{ asset('uploads/'.$article->image) }}" alt="{{ $article->image }}"/>
        <h2>{{ $article->title }}</h2>
        <p class="mb-4">{!! lineBreak($article->description) !!}</p>
        @foreach($article->ideas as $idea)
            <h3>{{ $idea->title }}</h3>
            <img class="mb-4 ideaMedia" src="{{ asset('uploads/'.$idea->image) }}" alt="{{ $idea->image }}"/>
            <p class="mb-4">{!! lineBreak($idea->description) !!}</p>
        @endforeach
        @auth    
            @if ( Auth::user()->role == 1 )
                <a class="button" href="{{ route('articles.edit', $article->id) }}">Modifier</a>
                <button class="buttonDestroy button">Supprimer</button>
                <form class="formDestroy mask" action="{{ route('articles.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="button" type="submit">Confirmer</button>
                </form>
            @endif
        @endauth
        <a class="button" href="{{ route('articles.index') }}">Retour</a>
    </section>

    

@endsection