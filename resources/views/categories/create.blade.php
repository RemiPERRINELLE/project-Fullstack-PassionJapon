@extends('template')

@section('content')

    <form class="text-center border border-light p-5" action="{{ route('categories.store')}}" method="POST">
        @csrf
        <p class="h4 mb-4">Créer une catégorie</p>

        <!-- TITLE -->
        <input type="text" name="title" class="form-control mb-4" value="{{ old('title') }}" placeholder="Titre catégorie">
        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <!-- IMAGE -->
        <input type="text" name="image" class="form-control mb-4" value="{{ old('image') }}" placeholder="Image catégorie">
        @error('image')
            <p>{{ $message }}</p>
        @enderror

        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit">Créer</button>

        <a class="button" href="{{ route('travels.index') }}">Retour</a>
    </form>

@endsection