@extends('template')

@section('content')
    <form class="text-center border border-light p-5" action="{{ route('media.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p class="h4 mb-4">Ajouter une image à la galerie</p>

        <!-- IMAGE -->
        <input type="file" name="image" accept="image/*" class="form-control mb-4">

        @error('image')
            <p>{{ $message }}</p>
        @enderror
        @if(session()->has('image-error'))
            <p>{{ session('image-error') }}</p>
        @endif

        <button class="btn btn-info btn-block" type="submit">Ajouter</button>

        <a class="button" href="{{ route('home') }}">Retour</a>

    </form>
@endsection