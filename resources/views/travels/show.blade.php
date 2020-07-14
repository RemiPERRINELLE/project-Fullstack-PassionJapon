@extends('template')

@section('content')

    <section class="travel">
        <img src="{{ asset('uploads/'.$category->image) }}" alt="{{ $category->image }}"/>
        <h3>{{ $category->title }}</h3>
        <p>{!! lineBreak($travel->description) !!}</p>
        <p>{{ $travel->price }}€</p>
        <p>{{ $travel->stock }}</p>
        <p>{{ $travel->date_start }}</p>
        <p>{{ $travel->date_end }}</p>
		<p>{{ $travel->date_closure }}</p>
		@auth
			@if ( Auth::user()->role == 1 )
				<a class="button" href="{{ route('travels.edit', $travel->id) }}">Modifier</a>
			@endif
		@endauth
		<a class="button" href="{{ route('categories.show', $category->id) }}">Retour</a>
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
					<input type="text" name="travel_id" class="form-control mb-4 mask" value="{{ $travel->id }}" placeholder="travel id">
					@error('travel_id')
						<p>{{ $message }}</p>
					@enderror
					<button class="btn btn-info btn-block" type="submit">Commenter</button>
				</form>
			@else
				<p>Vous devez être connecté pour pouvoir noter et commenter</p>
				<span><button><a href="{{ route('login') }}">Se connecter</a></button></span>
				<span><button><a href="{{ route('register') }}">S'inscrire</a></button></span>
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