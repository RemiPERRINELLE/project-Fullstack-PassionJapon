@extends('template')

@section('content')
    <form class="text-center border border-light p-5" action="{{ route('ideas.store')}}" method="POST">
        @csrf
        <p class="h4 mb-4">Créer une idée</p>

        <!-- TITLE -->
        <input type="text" name="title" class="form-control mb-4" value="{{ old('title') }}" placeholder="Titre idée">
        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <!-- IMAGE -->
        <input type="text" name="image" class="form-control mb-4" value="{{ old('image') }}" placeholder="Image idée">
        @error('image')
            <p>{{ $message }}</p>
        @enderror

        <!-- DESCRIPTION -->
        <div class="form-group">
            <textarea class="form-control rounded-0" name="description" rows="10" placeholder="Description">{{ old('description') }}</textarea>
        </div>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <!-- MEDIAS -->
        <label class="label">Media</label>
        <div class="select is-multiple">
            <select name="medias[]" multiple>
                @foreach($medias as $media)
                    <option value="{{ $media->id }}" {{ in_array($media->id, old('medias') ?: []) ? 'selected' : '' }}>{{ $media->image }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-info btn-block" type="submit">Créer</button>

        <a class="button" href="{{ route('ideas.index') }}">Retour</a>

    </form>
@endsection