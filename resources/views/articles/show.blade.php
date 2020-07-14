@extends('template')

@section('content')
    <div class="article-trailer">
        <img src="{{ asset('uploads/'.$article->image) }}" alt="{{ $article->image }}"/>
        <h3>{{ $article->title }}</h3>
        <p>{!! lineBreak($article->description) !!}</p>
        <h4>Idées reliées</h4>
        @foreach($article->ideas as $idea)
            <p>{{ $idea->title }}</p>
            <img src="{{ asset('uploads/'.$idea->image) }}" alt="{{ $idea->image }}"/>
            <p>{!! lineBreak($idea->description) !!}</p>
        @endforeach
        <a class="button" href="{{ route('articles.index') }}">Retour</a>
    </div>

    

@endsection