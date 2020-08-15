@extends('template')

@section('content')

    <section id="travelsMenu">
        <div>
            <h2>Circuits</h2>
        </div>

        @auth
            @if ( Auth::user()->role == 1 )
                <a class="button" href="{{ route('travels.create') }}">Créer un voyage</a>
                <a class="button" href="{{ route('categories.create') }}">Créer une catégorie</a>
                @if(session()->has('info'))
                    <p>{{ session('info') }}</p>
                @endif
            @endif
        @endauth

        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-6">
                    <div class="cat-bubble-container">
                        {{-- <a class="cat-bubble" href="{{ route('categories.show', $category->id) }}"><img src="{{ asset('uploads/'.$category->image) }}" alt="{{ $category->image }}"/><span>{{ $category->title }}</span></a> --}}
                        <a href="{{ route('categories.show', $category->id) }}"><img src="{{ asset('uploads/'.$category->image) }}" alt="{{ $category->image }}"/></a>
                        <a class="cat-bubble" href="{{ route('categories.show', $category->id) }}">{{ $category->title }}</a>
                    </div>
                    @auth
                        @if ( Auth::user()->role == 1 )
                            <a class="button" href="{{ route('categories.show', $category->id) }}">Voir</a>
                            <a class="button" href="{{ route('categories.edit', $category->id) }}">Modifier</a>
                            <button class="buttonDestroy button">Supprimer</button>
                            <form class="formDestroy mask" action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="button" type="submit">Confirmer</button>
                            </form>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    </section>

@endsection