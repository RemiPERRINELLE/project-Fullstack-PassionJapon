@extends('template')

@section('content')
    <form class="text-center border border-light p-5" action="{{ route('ideas.update', $idea->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p class="h4 mb-4">Modifier l'idée</p>

        <!-- TITLE -->
        <input type="text" name="title" class="form-control mb-4" value="{{ old('title', $idea->title) }}" placeholder="Titre idée">
        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <!-- IMAGE -->
        <input type="text" name="image" class="form-control mb-4" value="{{ old('image', $idea->image) }}" placeholder="Image idée">
        @error('image')
            <p>{{ $message }}</p>
        @enderror

        <!-- DESCRIPTION -->
        <div class="form-group">
            <textarea class="form-control rounded-0" name="description" rows="10" placeholder="Description">{{ old('description', $idea->description) }}</textarea>
        </div>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <!-- MEDIAS -->
        <label class="label">Idées</label>
        <div class="select is-multiple">
            <select name="medias[]" multiple>
                @foreach($medias as $media)
                    <option value="{{ $media->id }}" {{ in_array($media->id, old('medias') ?: $idea->media->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $media->image }}</option>
                @endforeach
            </select>
        </div>

        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit">Modifier</button>
        
        <a class="button" href="{{ route('ideas.index') }}">Retour</a>
    </form>
@endsection