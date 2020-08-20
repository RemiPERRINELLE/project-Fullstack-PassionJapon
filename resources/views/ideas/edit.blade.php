@extends('template')

@section('content')
    <form class="text-center border border-light p-5" action="{{ route('ideas.update', $idea->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p class="h4 mb-4">Modifier l'idée</p>

        <!-- TITLE -->
        <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" value="{{ old('title', $idea->title) }}" placeholder="Titre idée">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- IMAGE -->
        <input type="text" name="image" class="form-control mt-4  @error('image') is-invalid @enderror" value="{{ old('image', $idea->image) }}" placeholder="Image idée">
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- DESCRIPTION -->
        <textarea class="form-control rounded-1 mt-4  @error('descritpion') is-invalid @enderror" name="description" rows="10" placeholder="Description">{{ old('description', $idea->description) }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- MEDIAS -->
        <div class="field mt-4 mb-4">
            <label class="label">Images secondaires</label>
            <div class="select is-multiple">
                <select name="medias[]" multiple>
                    @foreach($medias as $media)
                        <option value="{{ $media->id }}" {{ in_array($media->id, old('medias') ?: $idea->media->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $media->image }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Send button -->
        <button class="button" type="submit">Modifier</button>
        
        <a class="button" href="{{ route('ideas.index') }}">Retour</a>
    </form>
@endsection