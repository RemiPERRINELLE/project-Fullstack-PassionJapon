@extends('template')

@section('content')

    <section class="travel">
		@if(session()->has('info'))
			<div class="alert alert-success col-4 text-center" role="alert">
                {{ session('info') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
		@endif
		<a href="{{ asset('uploads/'.$category->image) }}" data-lightbox="{{ $category->image }}" data-title="{{ $category->title }}">
			<img src="{{ asset('uploads/'.$category->image) }}" alt="{{ $category->image }}"/>
		</a>
		<h3 class="mt-4 mb-4">{{ $category->title }}</h3>
		<div id="travelDesc">
			<p><strong>Du {{ dateFormat($travel->date_start) }} au {{ dateFormat($travel->date_end) }}</strong></p>
			<p><span class="travelPrice">{{ $travel->price }}€</span><span class="ml-2"> Places restantes : {{ $travel->stock }} jusqu'au {{ fullDateFormat($travel->date_closure) }}.</span></p>
			<p class="mb-5 mt-5">{!! lineBreak($travel->description) !!}</p>
		</div>
        
		@auth
			@if( $user->role == 0 && $user->ban != 1 )
				<div id="travelDesc">
					<button id="commandButton" class="button button-left" href="">Commander</button>
					<form id="commandForm" class="mask" method="POST" action="{{ route('sales.store') }}">
						@csrf
						<label for="numberPlaces" class="d-inline-block mr-3">Places :</label>
						<input type="number" name="numberPlaces" class="form-control mb-4 col-2 d-inline-block" value="1" min="1" max="{{ $travel->stock }}">
						<input type="text" name="travel_id" class="form-control mb-4 mask" value="{{ $travel->id }}">
						@error('travel_id')
							<p>{{ $message }}</p>
						@enderror
						<input type="text" name="user_id" class="form-control mb-4 mask" value="{{ Auth::user()->id }}">
						@error('user_id')
							<p>{{ $message }}</p>
						@enderror
						<input type="number" name="stock" class="mask" value="{{ $travel->stock }}">
						<button class="button button-left d-inline-block ml-3" type="submit">Confirmer</button>
					</form>
				</div>
			@elseif( $user->ban == 1 )
				<p class="noAccess">&#x26A0; Vous êtes banni. Vous ne pouvez pas commander.</p>
			@endif
			@if ( Auth::user()->role == 1 )
				<a class="button" href="{{ route('travels.edit', $travel->id) }}">Modifier</a>
				<button id="buttonDestroy1" class="buttonDestroy button">Supprimer</button>
				<form id="formDestroy1" class="mask" action="{{ route('travels.destroy', $travel->id) }}" method="POST">
					@csrf
					@method('DELETE')
					<button class="button" type="submit">Confirmer</button>
				</form>
			@endif
		@else
			<p class="mb-0">Vous devez être connecté pour pouvoir commander</p>
			<span><a  class="button button-left d-inline-block" href="{{ route('login') }}">Se connecter</a></span>
			<span><a  class="button button-left d-inline-block ml-3" href="{{ route('register') }}">S'inscrire</a></span>
		@endauth
		<a class="button" href="{{ route('categories.show', $category->id) }}">Retour</a>
    </section>
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
						<textarea class="form-control rounded-1 mb-4 mt-4  @error('comment') is-invalid @enderror" name="comment" rows="5" placeholder="Commentaire" max="500">{{ old('comment') }}</textarea>
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
						<input type="text" name="travel_id" class="form-control mb-4 mask" value="{{ $travel->id }}" placeholder="travel id">
						@error('travel_id')
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
				<span><a class="button" href="{{ route('login') }}">Se connecter</a></span>
				<span><a class="button" href="{{ route('register') }}">S'inscrire</a></span>
			@endauth



			{{-- boucle récupérer les commentaires --}}

			@php
				$i=1;
				$j=2;
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
									<button id="buttonDestroy{{$j}}" class="buttonDestroy button">Supprimer</button>
									<form id="formDestroy{{$j}}" class="mask d-inline-block" action="{{ route('reactions.destroy', $reactionByUser->id) }}" method="POST">
										@csrf
										@method('DELETE')
										<button class="button" type="submit">Confirmer</button>
									</form>
									@php
										$j++;
									@endphp
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

@endsection