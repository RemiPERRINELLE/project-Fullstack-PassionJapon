@extends('template')

@section('content')

    <form class="font-weight-bold border border-light p-5" action="{{ route('categories.store')}}" method="POST">
        @csrf
        <h4 class="font-weight-bold text-center mb-4">Créer une catégorie</h4>

        <!-- TITLE -->
        <label for="title">Image :</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Titre catégorie" max="100">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- IMAGE -->
        <label for="image" class="mt-4">Image :</label>
        <input type="text" name="image" class="form-control mb-4 @error('image') is-invalid @enderror" value="{{ old('image') }}" placeholder="Image catégorie" max="100">
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- Send button -->
        <button class="button mb-4" type="submit">Créer</button>

        <a class="button" href="{{ route('travels.index') }}">Retour</a>
    </form>

@endsection