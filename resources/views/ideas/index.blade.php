@extends('template')

@section('content')

	<section id="ideasMenu">
		<h2>Idées</h2>

		@auth
			@if ( Auth::user()->role == 1 )
				@if(session()->has('info1') || session()->has('idea') || session()->has('info2'))
					<div class="alert alert-success col-4 text-center" role="alert">
						{{ session('info1') }}<a href="{{route('ideas.show', session('ideaId'))}}'" class="alert-link">{{ session('idea') }}</a>{{ session('info2') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif
				@if(session()->has('infoA') || session()->has('ideaTitle') || session()->has('infoB'))
					<div class="alert alert-success col-4 text-center" role="alert">
						{{ session('infoA') }}<strong>{{ session('ideaTitle') }}</strong>{{ session('infoB') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif
				<a class="button" href="{{ route('ideas.create') }}">Créer</a>
			@endif
		@endauth
		
		{{-- <div class="search">
			<form method="GET" action="">
				<input type="text" name="search" id="search" placeholder="Votre recherche">
				<input type="submit" value="Rechercher">
			</form>
		</div> --}}

		<div class="row">
			@foreach($ideas as $idea)
				@if( $idea->id != 1 )
					<div class="col-lg-4 col-md-6">
						<a href="{{ route('ideas.show', $idea->id) }}">
							<img src="{{ asset('uploads/'.$idea->image) }}" alt="{{ $idea->image }}"/>
						</a>
						<h3>{{ $idea->title }}</h3>
						<a class="button fas fa-eye fa-lg" href="{{ route('ideas.show', $idea->id) }}"></a>
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
					</div>
				@endif
			@endforeach
		</div>
	</section>

@endsection