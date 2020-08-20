@extends('template')

@section('content')

    <form class="text-center border border-light p-5" action="{{ route('categories.store')}}" method="POST">
        @csrf
        <p class="h4 mb-4">Créer une catégorie</p>

        <!-- TITLE -->
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Titre catégorie">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- IMAGE -->
        <input type="text" name="image" class="form-control mt-4 @error('image') is-invalid @enderror" value="{{ old('image') }}" placeholder="Image catégorie">
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- Send button -->
        <button class="button" type="submit">Créer</button>

        <a class="button" href="{{ route('travels.index') }}">Retour</a>
    </form>

@endsection