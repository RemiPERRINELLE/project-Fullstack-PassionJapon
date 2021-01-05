@extends('template')

@section('content')

    <section id="travelsMenu">
        <h2>Circuits</h2>

        @auth
            @if ( Auth::user()->role == 1 )
                @if(session()->has('info1') || session()->has('category') || session()->has('info2'))
                    <div class="alert alert-success col-6 text-center" role="alert">
                        {{ session('info1') }}<a href="{{route('categories.show', session('categoryId'))}}'" class="alert-link">{{ session('category') }}</a>{{ session('info2') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(session()->has('infoA') || session()->has('categoryTitle') || session()->has('infoB'))
                    <div class="alert alert-success col-6 text-center" role="alert">
                        {{ session('infoA') }}<strong>{{ session('categoryTitle') }}</strong>{{ session('infoB') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <a class="button" href="{{ route('travels.create') }}">Créer un voyage</a>
                <a class="button" href="{{ route('categories.create') }}">Créer une catégorie</a>
            @endif
        @endauth

        <div class="row">
            @php
                $i=1;
            @endphp
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
                            <button id="buttonDestroy{{$i}}" class="buttonDestroy button">Supprimer</button>
                            <form id="formDestroy{{$i}}" class="mask" action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="button" type="submit">Confirmer</button>
                            </form>
                            @php
                                $i++;
                            @endphp
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    </section>

@endsection