@extends('template')

@section('content')

    <section id="articlesMenu">
        <h2>Articles</h2>
        
        {{-- <div class="search">
            <form method="GET" action="">
                <input type="text" name="search" id="search" placeholder="Votre recherche">
                <input type="submit" value="Rechercher">
            </form>
        </div> --}}

        @auth
            @if ( Auth::user()->role == 1 )
                @if(session()->has('info1') || session()->has('article') || session()->has('info2'))
                    <div class="alert alert-success col-6 text-center" role="alert">
                        {{ session('info1') }}<a href="{{route('articles.show', session('articleId'))}}'" class="alert-link">{{ session('article') }}</a>{{ session('info2') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(session()->has('infoA') || session()->has('articleTitle') || session()->has('infoB'))
                    <div class="alert alert-success col-4 text-center" role="alert">
                        {{ session('infoA') }}<strong>{{ session('articleTitle') }}</strong>{{ session('infoB') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <a class="button" href="{{ route('articles.create') }}">Créer</a>
            @endif
        @endauth

        @foreach($articles as $article)
            <div class="articles">
                <a href="{{ route('articles.show', $article->id) }}">
                    <img src="{{ asset('uploads/'.$article->image) }}" alt="{{ $article->image }}"/>
                </a>
                <h3 class="mt-4 mb-4">{{ $article->title }}</h3>
                <p>{!! lineBreak($article->introduction) !!}</p>
                <a class="button fas fa-eye fa-lg" href="{{ route('articles.show', $article->id) }}"></a>
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
            </div>
        @endforeach
    </section>

@endsection