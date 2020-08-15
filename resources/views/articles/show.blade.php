@extends('template')

@section('content')
    <section class="article">
        <img src="{{ asset('uploads/'.$article->image) }}" alt="{{ $article->image }}"/>
        <h2>{{ $article->title }}</h2>
        <p>{!! lineBreak($article->description) !!}</p>
        <h4>Idées reliées</h4>
        @foreach($article->ideas as $idea)
            <h3>{{ $idea->title }}</h3>
            <img src="{{ asset('uploads/'.$idea->image) }}" alt="{{ $idea->image }}"/>
            <p>{!! lineBreak($idea->description) !!}</p>
        @endforeach
        <a class="button" href="{{ route('articles.index') }}">Retour</a>
    </section>

    

@endsection