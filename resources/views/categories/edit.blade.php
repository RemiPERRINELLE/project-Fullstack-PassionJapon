@extends('template')

@section('content')

    <form class="text-center border border-light p-5" action="{{ route('categories.update', $category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <p class="h4 mb-4">Modifier une catégorie</p>

        <!-- TITLE -->
        <input type="text" name="title" class="form-control mb-4" value="{{ old('title', $category->title) }}" placeholder="Titre catégorie">
        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <!-- IMAGE -->
        <input type="text" name="image" class="form-control mb-4" value="{{ old('image', $category->image) }}" placeholder="Image catégorie">
        @error('image')
            <p>{{ $message }}</p>
        @enderror

        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit">Modifier</button>

        <a class="button" href="{{ route('travels.index') }}">Retour</a>
    </form>

@endsection