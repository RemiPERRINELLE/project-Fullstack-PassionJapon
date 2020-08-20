@extends('template')

@section('content')
    <form class="text-center border border-light p-5" action="{{ route('ideas.store')}}" method="POST">
        @csrf
        <p class="h4 mb-4">Créer une idée</p>

        <!-- TITLE -->
        <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Titre idée">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- IMAGE -->
        <input type="text" name="image" class="form-control mt-4  @error('image') is-invalid @enderror" value="{{ old('image') }}" placeholder="Image idée">
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- DESCRIPTION -->
        <textarea class="form-control rounded-1 mt-4  @error('descritpion') is-invalid @enderror" name="description" rows="10" placeholder="Description">{{ old('description') }}</textarea>
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
                        <option value="{{ $media->id }}" {{ in_array($media->id, old('medias') ?: []) ? 'selected' : '' }}>{{ $media->image }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button class="button" type="submit">Créer</button>

        <a class="button" href="{{ route('ideas.index') }}">Retour</a>

    </form>
@endsection