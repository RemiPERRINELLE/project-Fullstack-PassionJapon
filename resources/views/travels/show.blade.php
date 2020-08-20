@extends('template')

@section('content')

    <section class="travel">
		@if(session()->has('info'))
			<p>{{ session('info') }}</p>
		@endif
        <img src="{{ asset('uploads/'.$category->image) }}" alt="{{ $category->image }}"/>
        <h3>Titre : {{ $category->title }}</h3>
        <p id="travelDesc">Description : {!! lineBreak($travel->description) !!}</p>
        <p>Prix : {{ $travel->price }}€</p>
        <p>Stock : {{ $travel->stock }}</p>
        <p>Du : {{ dateFormat($travel->date_start) }} au {{ dateFormat($travel->date_end) }}</p>
		@auth
			<button id="commandButton" class="button" href="">Commander</button>
			<p>jusqu'au {{ fullDateFormat($travel->date_closure) }}</p>
			<form id="commandForm" class="mask" method="POST" action="{{ route('sales.store') }}">
				@csrf
				<input type="number" name="numberPlaces" class="form-control mb-4" value="1" placeholder="1" min="1" max="{{ $travel->stock }}">
				<input type="text" name="travel_id" class="form-control mb-4 mask" value="{{ $travel->id }}">
				@error('travel_id')
					<p>{{ $message }}</p>
				@enderror
				<input type="text" name="user_id" class="form-control mb-4 mask" value="{{ Auth::user()->id }}">
				@error('user_id')
					<p>{{ $message }}</p>
				@enderror
				<input type="number" name="stock" class="mask" value="{{ $travel->stock }}">
				<button class="button" type="submit">Confirmer la commande</button>
			</form>
			@if ( Auth::user()->role == 1 )
				<a class="button" href="{{ route('travels.edit', $travel->id) }}">Modifier</a>
			@endif
		@else
			<p>Vous devez être connecté pour pouvoir commander</p>
			<span><a  class="button" href="{{ route('login') }}">Se connecter</a></span>
			<span><a  class="button" href="{{ route('register') }}">S'inscrire</a></span>
		@endauth
		<a class="button" href="{{ route('categories.show', $category->id) }}">Retour</a>
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
					<textarea class="form-control rounded-1 mb-4 mt-4  @error('comment') is-invalid @enderror" name="comment" rows="10" placeholder="Commentaire">{{ old('comment') }}</textarea>
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
			@else
				<p>Vous devez être connecté pour pouvoir noter et commenter</p>
				<span><a  class="button" href="{{ route('login') }}">Se connecter</a></span>
				<span><a  class="button" href="{{ route('register') }}">S'inscrire</a></span>
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
							<p>{{ $reactionByUser->created_at }}</p>
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