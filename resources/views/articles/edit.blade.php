@extends('template')

@section('content')

    @auth    
        @if ( Auth::user()->role == 1 )

            <form class="border border-light p-5 font-weight-bold" action="{{ route('articles.update', $article->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h4 class="mb-4 text-center font-weight-bold">Modifier l'article</h4>

                <!-- TITLE -->
                <label for="title">Titre :</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $article->title) }}" placeholder="Titre article" max="100">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- IMAGE -->
                <label for="image" class="mt-4">Image :</label>
                <input type="text" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $article->image) }}" placeholder="Image article" max="100">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- INTRODUCTION -->
                <label for="introduction" class="mt-4">Introduction :</label>
                <textarea class="form-control rounded-1 @error('introduction') is-invalid @enderror" name="introduction" rows="10" placeholder="Introduction" max="100000">{{ old('introduction', $article->introduction) }}</textarea>
                @error('introduction')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- DESCRIPTION -->
                <label for="description" class="mt-4">Description :</label>
                <textarea class="form-control rounded-1 @error('description') is-invalid @enderror" name="description" rows="10" placeholder="Description" max="100000">{{ old('description', $article->description) }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- CONCLUSION -->
                <label for="conclusion" class="mt-4">Conclusion :</label>
                <textarea class="form-control rounded-1 @error('conclusion') is-invalid @enderror" name="conclusion" rows="10" placeholder="Conclusion" max="100000">{{ old('conclusion', $article->conclusion) }}</textarea>
                @error('conclusion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- IDEAS -->
                <div class="field mt-4 mb-4 text-center">
                    <label class="label">Idées affiliées :</label>
                    <div class="select is-multiple">
                        <select name="ideas[]" multiple>
                            @foreach($ideas as $idea)
                                <option value="{{ $idea->id }}" {{ in_array($idea->id, old('ideas') ?: $article->ideas->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $idea->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Send button -->
                <button class="button mb-4" type="submit">Modifier</button>

                <a class="button" href="{{ route('articles.index') }}">Retour</a>
            </form>


        @else
            <p class="stop">&#x26A0;</p>
            <p class="noAccess">Cette page est réservée aux administrateurs.</p>
        @endif
    @else
        <p class="stop">&#x26A0;</p>
        <p class="noAccess">Cette page est réservée aux administrateurs.</p>
    @endauth

@endsection