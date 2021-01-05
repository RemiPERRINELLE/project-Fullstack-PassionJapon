@extends('template')

@section('content')

    @auth    
        @if ( Auth::user()->role == 1 )

            <form class="font-weight-bold border border-light p-5" action="{{ route('categories.update', $category->id)}}" method="POST">
                @csrf
                @method('PUT')
                <h4 class="text-center font-weight-bold mb-4">Modifier une catégorie</h4>

                <!-- TITLE -->
                <label for="title">Titre :</label>
                <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" value="{{ old('title', $category->title) }}" placeholder="Titre catégorie" max="100">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- IMAGE -->
                <label for="image" class="mt-4">Image :</label>
                <input type="text" name="image" class="form-control mb-4  @error('image') is-invalid @enderror" value="{{ old('image', $category->image) }}" placeholder="Image catégorie" max="100">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- Send button -->
                <button class="button mb-4" type="submit">Modifier</button>

                <a class="button" href="{{ route('travels.index') }}">Retour</a>
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