@extends('template')

@section('content')
    @auth
        @if ( Auth::user()->role == 1 )
            @if(session()->has('info'))
                <p>{{ session('info') }}</p>
            @endif
            
        <form class="text-center border border-light p-5" action="{{ route('media.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <p class="h4 mb-4">Ajouter une image à la galerie</p>

            <!-- IMAGE -->
            <input type="file" name="image" accept="image/*" class="form-control mb-4">

            @error('image')
                <p>{{ $message }}</p>
            @enderror
            @if(session()->has('image-error'))
                <p>{{ session('image-error') }}</p>
            @endif

            <button class="button" type="submit">Ajouter</button>

            <a class="button" href="{{ route('home') }}">Retour</a>

        </form>
        @else
            <p>Vous n'avez pas accès à cette page</p>
        @endif
    @endauth
@endsection