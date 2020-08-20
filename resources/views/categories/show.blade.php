@extends('template')

@section('content')

		<section class="category">
			<img src="{{ asset('uploads/'.$category->image) }}" alt="{{ $category->image }}"/>
			<h3>{{ $category->title }}</h3>
			
			@foreach($travels as $travel)
				@if($travel->closured == "No")
					<div class="travels-category">
						<p>Du {{ dateFormat($travel->date_start) }} au {{ dateFormat($travel->date_end) }}</p>
						<p>Prix : {{ $travel->price }}€</p>
						<p>Stock : {{ $travel->stock }}</p>
						<p>Réservations jusqu'au : {{ fullDateFormat($travel->date_closure) }}</p>
						<p>{!! lineBreak($travel->description) !!}</p>
						<a class="button fas fa-eye fa-lg" href="{{ route('travels.show', $travel->id) }}"></a>
					</div>
				@endif
			@endforeach
			
			<a class="button" href="{{ route('travels.index') }}">Retour</a>
		</section>

		
@endsection