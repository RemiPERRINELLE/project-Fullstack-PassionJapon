@extends('template')

@section('content')

	<section class="idea">
		<img src="{{ asset('uploads/'.$idea->image) }}" alt="{{ $idea->image }}"/>
		<h2>{{ $idea->title }}</h2>
		<p class="mb-4">{!! lineBreak($idea->description) !!}</p>
		<div class="row">
			@foreach($idea->media as $media)
			<div class="col-lg-4 col-md-6">
				<img class="ideaMedia" src="{{ asset('uploads/'.$media->image) }}" alt="{{ $media->image }}"/>
			</div>
			@endforeach
		</div>
			
		@auth    
			@if ( Auth::user()->role == 1 )
				<a class="button" href="{{ route('ideas.edit', $idea->id) }}">Modifier</a>
				<button class="buttonDestroy button">Supprimer</button>
				<form class="formDestroy mask" action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
					@csrf
					@method('DELETE')
					<button class="button" type="submit">Confirmer</button>
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
					<input type="text" name="note" class="form-control mt-4  @error('note') is-invalid @enderror" value="{{ old('note') }}" placeholder="Note sur 5">
					@error('note')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<textarea class="form-control rounded-1 mt-4 mb-4  @error('comment') is-invalid @enderror" name="comment" rows="10" placeholder="Commentaire">{{ old('comment') }}</textarea>
					@error('comment')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<input type="text" name="user_id" class="form-control mb-4 mask" value="{{ Auth::user()->id }}" placeholder="user id">
					@error('user_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<input type="text" name="idea_id" class="form-control mb-4 mask" value="{{ $idea->id }}" placeholder="idea id">
					@error('idea_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<button class="button" type="submit">Commenter</button>
				</form>
			@else
				<p>Vous devez être connecté pour pouvoir noter et commenter</p>
				<a href="{{ route('login') }}">Se connecter</a>
				<a href="{{ route('register') }}">S'inscrire</a>
			@endauth

			{{-- boucle récupérer les commentaires --}}

			@foreach($reactionsByUsers as $reactionByUser)
				@if( $reactionByUser->ban == 0 )
					<div class="card card-comment">
						<div class="card-body">
							<div class="user-comment">
								<img class="avatar" src="{{ $reactionByUser->avatar!=NULL ? asset('uploads/users/' . $reactionByUser->user_id . '/' . $reactionByUser->avatar) : asset('uploads/userDefault.png') }}" alt="Avatar utilisateur"/>
								<span>{{ $reactionByUser->pseudo }}</span>
								<span class="user-note">{{ $reactionByUser->note }} / 5</span>
							</div>
							<p class="card-text">{!! lineBreak($reactionByUser->comment) !!}</p>
							<p>{{ fullDateFormat($reactionByUser->created_at) }}</p>
							@auth    
								@if ( Auth::user()->role == 1 )
									<a class="button" href="{{ route('reactions.edit', $reactionByUser->id) }}">Modifier</a>
									<button class="buttonDestroy button">Supprimer</button>
									<form class="formDestroy mask" action="{{ route('reactions.destroy', $reactionByUser->id) }}" method="POST">
										@csrf
										@method('DELETE')
										<button class="button" type="submit">Confirmer</button>
									</form>
								@endif
							@endauth
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</section>
@endsection