@extends('template')

@section('content')

	<section class="idea">
		<img src="{{ asset('uploads/'.$idea->image) }}" alt="{{ $idea->image }}"/>
		<h3>{{ $idea->title }}</h3>
		<p>{!! lineBreak($idea->description) !!}</p>
		<h4>Images media reliées</h4>
        @foreach($idea->media as $media)
            <img src="{{ asset('uploads/'.$media->image) }}" alt="{{ $media->image }}"/>
        @endforeach
		@auth    
			@if ( Auth::user()->role == 1 )
				<a class="button" href="{{ route('ideas.edit', $idea->id) }}">Modifier</a>
				<form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
					@csrf
					@method('DELETE')
					<button class="button" type="submit">Supprimer</button>
				</form>
			@endif
		@endauth
		<a class="button" href="{{ route('ideas.index') }}">Retour</a>
	</section>
	<section class="comments">
		<div class="card main-card">
			<h4>Commentaires</h4>
			@auth
				<form class="text-center border border-light p-5" action="{{ route('reactions.store')}}" method="POST">
					@csrf
					<input type="text" name="note" class="form-control mb-4" value="{{ old('note') }}" placeholder="Note sur 5">
					@error('note')
						<p>{{ $message }}</p>
					@enderror
					<div class="form-group">
						<textarea class="form-control rounded-0" name="comment" rows="10" placeholder="Commentaire">{{ old('comment') }}</textarea>
					</div>
					@error('comment')
						<p>{{ $message }}</p>
					@enderror
					<input type="text" name="user_id" class="form-control mb-4 mask" value="{{ Auth::user()->id }}" placeholder="user id">
					@error('user_id')
						<p>{{ $message }}</p>
					@enderror
					<input type="text" name="idea_id" class="form-control mb-4 mask" value="{{ $idea->id }}" placeholder="idea id">
					@error('idea_id')
						<p>{{ $message }}</p>
					@enderror
					<button class="btn btn-info btn-block" type="submit">Commenter</button>
				</form>
			@else
				<p>Vous devez être connecté pour pouvoir noter et commenter</p>
				<a href="{{ route('login') }}">Se connecter</a>
				<a href="{{ route('register') }}">S'inscrire</a>
			@endauth

			{{-- boucle récupérer les commentaires --}}
			@foreach($reactions as $reaction)
				@if( $reaction->ban == 0 )
					<div class="card card-comment">
						<div class="card-body">
							<div class="user-comment">
								<img class="avatar" src="{{ asset('uploads/users/' . Auth::user()->id . '/' . Auth::user()->avatar) }}"/>
								<span>{{ $reaction->pseudo }}</span>
								<span class="user-note">{{ $reaction->note }} / 5</span>
							</div>
							<p class="card-text">{!! lineBreak($reaction->comment) !!}</p>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</section>
@endsection