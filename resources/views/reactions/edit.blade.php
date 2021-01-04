@extends('template')

@section('content')
    <form class="font-weight-bold border border-light p-5" action="{{ route('reactions.update', $reaction->id)}}" method="POST">
        @csrf
        @method('PUT')
        <h4 class="text-center font-weight-bold mb-4">Modifier le commentaire</h4>

        <p class="noteStars"> Note :
            @if( $reaction->note == 1 )
                <span class="1star user-note-no-point pointer">&#x2605</span>
                <span class="2stars user-note-no-point pointer">&#x2606</span>
                <span class="3stars user-note-no-point pointer">&#x2606</span>
                <span class="4stars user-note-no-point pointer">&#x2606</span>
                <span class="5stars user-note-no-point pointer">&#x2606</span>
            @elseif( $reaction->note == 2 )
                <span class="1star user-note-no-point pointer">&#x2605</span>
                <span class="2stars user-note-no-point pointer">&#x2605</span>
                <span class="3stars user-note-no-point pointer">&#x2606</span>
                <span class="4stars user-note-no-point pointer">&#x2606</span>
                <span class="5stars user-note-no-point pointer">&#x2606</span>
            @elseif( $reaction->note == 3 )
                <span class="1star user-note-no-point pointer">&#x2605</span>
                <span class="2stars user-note-no-point pointer">&#x2605</span>
                <span class="3stars user-note-no-point pointer">&#x2605</span>
                <span class="4stars user-note-no-point pointer">&#x2606</span>
                <span class="5stars user-note-no-point pointer">&#x2606</span>
            @elseif( $reaction->note == 4 )
                <span class="1star user-note-no-point pointer">&#x2605</span>
                <span class="2stars user-note-no-point pointer">&#x2605</span>
                <span class="3stars user-note-no-point pointer">&#x2605</span>
                <span class="4stars user-note-no-point pointer">&#x2605</span>
                <span class="5stars user-note-no-point pointer">&#x2606</span>
            @elseif( $reaction->note == 5 )
                <span class="1star user-note-no-point pointer">&#x2605</span>
                <span class="2stars user-note-no-point pointer">&#x2605</span>
                <span class="3stars user-note-no-point pointer">&#x2605</span>
                <span class="4stars user-note-no-point pointer">&#x2605</span>
                <span class="5stars user-note-no-point pointer">&#x2605</span>
            @else
                <span class="1star user-note-no-point pointer">&#x2606</span>
                <span class="2stars user-note-no-point pointer">&#x2606</span>
                <span class="3stars user-note-no-point pointer">&#x2606</span>
                <span class="4stars user-note-no-point pointer">&#x2606</span>
                <span class="5stars user-note-no-point pointer">&#x2606</span>
            @endif
        </p>
        <input type="number" name="note" class="noteChoice mask form-control mt-4 col-2 @error('note') is-invalid @enderror" value="{{ old('note', $reaction->note) }}" min="1" max="5">
        @error('note')
            <p>{{ $message }}</p>
        @enderror
        
        <div class="form-group">
            <label for="comment">Commentaire :</label>
            <textarea class="form-control rounded-0" name="comment" rows="10" placeholder="Commentaire" max="500">{{ old('comment', $reaction->comment) }}</textarea>
        </div>
        @error('comment')
            <p>{{ $message }}</p>
        @enderror

        <button class="button mb-4 mt-4" type="submit">Modifier</button>

        <a class="button" href="{{ route('comments') }}">Retour</a>
    </form>
@endsection