@extends('template')

@section('content')

	<section id="ideasMenu">
		<div>
			<h2>Idées</h2>
		</div>
		<div class="search">
			<form method="GET" action="">
				<input type="text" name="search" id="search" placeholder="Votre recherche">
				<input type="submit" value="Rechercher">
			</form>
		</div>

		@auth
			@if ( Auth::user()->role == 1 )
				<a class="button" href="{{ route('ideas.create') }}">Créer</a>
				@if(session()->has('info'))
					<p>{{ session('info') }}</p>
				@endif
			@endif
		@endauth

		<div class="row">
			@foreach($ideas as $idea)
				<div class="col-lg-4 col-md-6">
					<a href="{{ route('ideas.show', $idea->id) }}">
						<img src="{{ asset('uploads/'.$idea->image) }}" alt="{{ $idea->image }}"/>
					</a>
					<h3>{{ $idea->title }}</h3>
					<a class="button fas fa-eye fa-lg" href="{{ route('ideas.show', $idea->id) }}"></a>
				</div>
			@endforeach
		</div>
	</section>

@endsection