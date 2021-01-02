@extends('template')

@section('content')
    <form class="text-center border border-light p-5" action="{{ route('articles.store')}}" method="POST">
        @csrf
        <p class="h4 mb-4">Créer un article</p>

        <!-- TITLE -->
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Titre article">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- IMAGE -->
        <input type="text" name="image" class="form-control mt-4 @error('image') is-invalid @enderror" value="{{ old('image') }}" placeholder="Image article">
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- INTRODUCTION -->
        <textarea class="form-control rounded-1 mt-4 @error('introduction') is-invalid @enderror" name="introduction" rows="10" placeholder="Introduction">{{ old('introduction') }}</textarea>
        @error('introduction')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- DESCRIPTION -->
        <textarea class="form-control rounded-1 mt-4 @error('description') is-invalid @enderror" name="description" rows="10" placeholder="Description">{{ old('description') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- CONCLUSION -->
        <textarea class="form-control rounded-1 mt-4 @error('conclusion') is-invalid @enderror" name="conclusion" rows="10" placeholder="Conclusion">{{ old('conclusion') }}</textarea>
        @error('conclusion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- IDEAS -->
        <div class="field mt-4 mb-4">
            <label class="label">Idées</label>
            <div class="select is-multiple">
                <select name="ideas[]" multiple>
                    @foreach($ideas as $idea)
                        <option value="{{ $idea->id }}" {{ in_array($idea->id, old('ideas') ?: []) ? 'selected' : '' }}>{{ $idea->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <!-- Send button -->
        <button class="button" type="submit">Créer</button>

        <a class="button" href="{{ route('articles.index') }}">Retour</a>

    </form>
@endsection