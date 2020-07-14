@extends('template')

@section('content')
    <form class="text-center border border-light p-5" action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p class="h4 mb-4">Modifier l'article</p>

        <!-- TITLE -->
        <input type="text" name="title" class="form-control mb-4" value="{{ old('title', $article->title) }}" placeholder="Titre article">
        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <!-- IMAGE -->
        <input type="text" name="image" class="form-control mb-4" value="{{ old('image', $article->image) }}" placeholder="Image article">
        @error('image')
            <p>{{ $message }}</p>
        @enderror

        <!-- DESCRIPTION -->
        <div class="form-group">
            <textarea class="form-control rounded-0" name="description" rows="10" placeholder="Description">{{ old('description', $article->description) }}</textarea>
        </div>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <!-- IDEAS -->
        <label class="label">Idées</label>
        <div class="select is-multiple">
            <select name="ideas[]" multiple>
                @foreach($ideas as $idea)
                    <option value="{{ $idea->id }}" {{ in_array($idea->id, old('ideas') ?: $article->ideas->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $idea->title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit">Modifier</button>

        <a class="button" href="{{ route('articles.index') }}">Retour</a>


    </form>
@endsection