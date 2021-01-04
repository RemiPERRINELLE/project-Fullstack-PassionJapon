@extends('template')

@section('content')
    @auth
        @if ( Auth::user()->role == 1 )
            @if(session()->has('info'))
                <div class="alert alert-success col-4 text-center" role="alert">
                    {{ session('info') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            
        <form class="font-weight-bold border border-light p-5" action="{{ route('media.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 class="text-center font-weight-bold mb-4">Ajouter une image à la galerie</h4>

            <!-- IMAGE -->
            <label for="image" class="mt-4">Image :</label>
            <input type="file" name="image" accept="image/*" class="form-control mb-4" max="5000">

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @if(session()->has('image-error'))
                <span class="invalid-feedback invalidMedia" role="alert">
                    <strong>{{ session('image-error') }}</strong>
                </span>
            @endif

            <button class="button" type="submit">Ajouter</button>

            <a class="button" href="{{ route('home') }}">Retour</a>

        </form>
        @else
            <p>Vous n'avez pas accès à cette page</p>
        @endif
    @endauth
@endsection