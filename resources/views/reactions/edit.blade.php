@extends('template')

@section('content')
    <form class="text-center border border-light p-5" action="{{ route('reactions.update', $reaction->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="note" class="form-control mb-4" value="{{ old('note', $reaction->note) }}" placeholder="Note sur 5">
        @error('note')
            <p>{{ $message }}</p>
        @enderror
        <div class="form-group">
            <textarea class="form-control rounded-0" name="comment" rows="10" placeholder="Commentaire">{{ old('comment', $reaction->comment) }}</textarea>
        </div>
        @error('comment')
            <p>{{ $message }}</p>
        @enderror
        <button class="btn btn-info btn-block" type="submit">Modifier</button>
        <a class="button" href="{{ route('comments') }}">Retour</a>
    </form>
@endsection