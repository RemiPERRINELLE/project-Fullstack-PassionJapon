@extends('template')

@section('content')
    <form class="font-weight-bold border border-light p-5" action="{{ route('ideas.update', $idea->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h4 class="text-center font-weight-bold mb-4">Modifier l'idée</h4>

        <!-- TITLE -->
        <label for="title">Titre :</label>
        <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" value="{{ old('title', $idea->title) }}" placeholder="Titre idée" max="100">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- IMAGE -->
        <label for="image" class="mt-4">Image :</label>
        <input type="text" name="image" class="form-control  @error('image') is-invalid @enderror" value="{{ old('image', $idea->image) }}" placeholder="Image idée" max="100">
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- DESCRIPTION -->
        <label for="description" class="mt-4">Description :</label>
        <textarea class="form-control rounded-1  @error('descritpion') is-invalid @enderror" name="description" rows="10" placeholder="Description" max="100000">{{ old('description', $idea->description) }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- MEDIAS -->
        <div class="text-center field mt-4 mb-4">
            <label class="label">Images secondaires :</label>
            <div class="select is-multiple">
                <select name="medias[]" multiple>
                    @foreach($medias as $media)
                        <option value="{{ $media->id }}" {{ in_array($media->id, old('medias') ?: $idea->media->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $media->image }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Send button -->
        <button class="button mb-4" type="submit">Modifier</button>
        
        <a class="button" href="{{ route('ideas.index') }}">Retour</a>
    </form>
@endsection