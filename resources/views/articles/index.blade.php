@extends('template')

@section('content')

    <section id="articlesMenu">
        <div>
            <h2>Articles</h2>
        </div>
        <div class="search">
            <form method="GET" action="">
                <input type="text" name="search" id="search" placeholder="Votre recherche">
                <input type="submit" value="Rechercher">
            </form>
        </div>

        @auth
            @if ( Auth::user()->role == 1 )
                <a class="button" href="{{ route('articles.create') }}">Créer</a>
                @if(session()->has('info'))
                    <p>{{ session('info') }}</p>
                @endif
            @endif
        @endauth

        @foreach($articles as $article)
            <div class="article-trailer">
                <img src="{{ asset('uploads/'.$article->image) }}" alt="{{ $article->image }}"/>
                <h3>{{ $article->title }}</h3>
                <p>{!! lineBreak($article->description) !!}</p>
                <a class="button fas fa-eye fa-lg" href="{{ route('articles.show', $article->id) }}"></a>
                @auth    
                    @if ( Auth::user()->role == 1 )
                        <a class="button" href="{{ route('articles.edit', $article->id) }}">Modifier</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="button" type="submit">Supprimer</button>
                        </form>
                    @endif
                @endauth
            </div>
        @endforeach
    </section>

@endsection