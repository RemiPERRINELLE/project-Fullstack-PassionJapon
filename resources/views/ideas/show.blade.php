@extends('template')

@section('content')

	@if( $idea->id == 1 )

	@else

		<section class="idea">
			<a href="{{ asset('uploads/'.$idea->image) }}" data-lightbox="{{ $idea->image }}" data-title="{{ $idea->title }}">
				<img src="{{ asset('uploads/'.$idea->image) }}" alt="{{ $idea->image }}"/>
			</a>
			<h2>{{ $idea->title }}</h2>
			<p class="mb-5">{!! lineBreak($idea->description) !!}</p>
			<div class="row">
				@foreach($idea->media as $media)
				<div class="col-lg-4 col-md-6">
					<a href="{{ asset('uploads/'.$media->image) }}" data-lightbox="Images secondaires" data-title="{{ $idea->title }} : images secondaires">
						<img class="ideaMedia" src="{{ asset('uploads/'.$media->image) }}" alt="{{ $media->image }}"/>
					</a>
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

		
		<!-- COMMENTS -->

		<section class="comments">
			<div class="card main-card">
				<h4 class="mb-4">Commentaires</h4>
				@auth
					@if( $user->role == 0 && $user->ban != 1 )
						<form class="text-center pb-5 pl-5 pr-5 pt-0" action="{{ route('reactions.store')}}" method="POST">
							@csrf
							<p class="noteStars text-left"> Note :
								<span class="1star user-note-no-point pointer">&#x2606</span>
								<span class="2stars user-note-no-point pointer">&#x2606</span>
								<span class="3stars user-note-no-point pointer">&#x2606</span>
								<span class="4stars user-note-no-point pointer">&#x2606</span>
								<span class="5stars user-note-no-point pointer">&#x2606</span>
							</p>
							<input type="number" name="note" class="noteChoice mask form-control mt-4 col-2 @error('note') is-invalid @enderror" value="{{ old('note') }}" min="1" max="5">
							@error('note')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<textarea class="form-control rounded-1 mt-4 mb-4  @error('comment') is-invalid @enderror" name="comment" rows="5" placeholder="Commentaire" max="500">{{ old('comment') }}</textarea>
							@error('comment')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<input type="text" name="user_id" class="form-control mb-4 mask" value="{{ $user->id }}" placeholder="user id">
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
					@elseif( $user->ban == 1 )
						<p class="noAccess">&#x26A0; Vous êtes banni. Vous ne pouvez pas commenter.</p>
					@endif
				@else
					<p>Vous devez être connecté pour pouvoir noter et commenter</p>
					<a class="button" href="{{ route('login') }}">Se connecter</a>
					<a class="button" href="{{ route('register') }}">S'inscrire</a>
				@endauth

				{{-- boucle récupérer les commentaires --}}

				@php
					$i=1;
				@endphp
				@foreach($reactionsByUsers as $reactionByUser)
					@if( $reactionByUser->ban == 0 )
						<div class="card card-comment">
							<div class="card-body">
								<div class="user-comment">
									<a href="{{ $reactionByUser->avatar!=NULL ? asset('uploads/users/' . $reactionByUser->user_id . '/' . $reactionByUser->avatar) : asset('uploads/userDefault.png') }}" data-lightbox="{{ $reactionByUser->id }}" data-title="{{ $reactionByUser->pseudo }}">
										<img class="avatar" src="{{ $reactionByUser->avatar!=NULL ? asset('uploads/users/' . $reactionByUser->user_id . '/' . $reactionByUser->avatar) : asset('uploads/userDefault.png') }}" alt="Avatar utilisateur"/>
									</a>
									<span class="user-pseudo calligraf">{{ $reactionByUser->pseudo }}</span>
									<span id="{{$i}}" class="user-note mask">{{ $reactionByUser->note }}</span>
									<p>{!! lineBreak($reactionByUser->comment) !!}</p>
									<p class="card-text">{{ fullDateFormat($reactionByUser->updated_at) }}</p>
								</div>
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
					@php
						$i++;	
					@endphp
				@endforeach
			</div>
		</section>

	@endif


@endsection