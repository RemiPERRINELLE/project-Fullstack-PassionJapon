@extends('template')

@section('content')

		<section class="category">
			<a href="{{ asset('uploads/'.$category->image) }}" data-lightbox="{{ $category->image }}" data-title="{{ $category->title }}">
				<img src="{{ asset('uploads/'.$category->image) }}" alt="{{ $category->image }}"/>
			</a>
			<h3>{{ $category->title }}</h3>
			@auth    
				@if ( Auth::user()->role == 1 )
					@if(session()->has('info1') || session()->has('category') || session()->has('info2'))
						<div class="alert alert-success col-6 text-center" role="alert">
							{{ session('info1') }}<a href="{{route('travels.show', session('travelId'))}}'" class="alert-link">{{ session('category') }}</a>{{ session('info2') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
					@if(session()->has('infoA') || session()->has('categoryTitle') || session()->has('infoB'))
						<div class="alert alert-success col-6 text-center" role="alert">
							{{ session('infoA') }}<strong>{{ session('categoryTitle') }}</strong>{{ session('infoB') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
					<a class="button" href="{{ route('categories.edit', $category->id) }}">Modifier</a>
					<button id="buttonDestroy1" class="buttonDestroy button">Supprimer</button>
					<form id="formDestroy1" class="mask" action="{{ route('categories.destroy', $category->id) }}" method="POST">
						@csrf
						@method('DELETE')
						<button class="button" type="submit">Confirmer</button>
					</form>
					<a class="button" href="{{ route('travels.create') }}">Créer un voyage</a>
				@endif
			@endauth

			@php
				$i=2;
			@endphp
			@foreach($travels as $travel)
				@if($travel->closured == "No")
					<div class="travels-category">
						<p><strong>Du {{ dateFormat($travel->date_start) }} au {{ dateFormat($travel->date_end) }}</strong></p>
						<p><span class="travelPrice">{{ $travel->price }}€</span><span class="ml-2"> Places restantes : {{ $travel->stock }}.</span></p>
						<p>Réservations jusqu'au : {{ fullDateFormat($travel->date_closure) }}</p>
						<a class="button button-left fas fa-eye fa-lg" href="{{ route('travels.show', $travel->id) }}"></a>
						@auth
							@if ( Auth::user()->role == 1 )
								<a class="button" href="{{ route('travels.edit', $travel->id) }}">Modifier</a>
								<button id="buttonDestroy{{$i}}" class="buttonDestroy button">Supprimer</button>
								<form id="formDestroy{{$i}}" class="mask" action="{{ route('travels.destroy', $travel->id) }}" method="POST">
									@csrf
									@method('DELETE')
									<button class="button" type="submit">Confirmer</button>
								</form>
								@php
									$i++;
								@endphp
							@endif
						@endauth
					</div>
				@endif
			@endforeach
			<a class="button" href="{{ route('travels.index') }}">Retour</a>
		</section>

		
@endsection