@extends('template')

@section('content')

		<section class="category">
			<img src="{{ asset('uploads/'.$category->image) }}" alt="{{ $category->image }}"/>
			<h3>{{ $category->title }}</h3>
			
			@foreach($travels as $travel)
				<div class="travels-category">
					<p>Du {{ $travel->date_start }} au {{ $travel->date_end }}</p>
					<p>Prix : {{ $travel->price }}€</p>
					<p>Stock : {{ $travel->stock }}</p>
					<p>Réservations jusqu'au : {{ $travel->date_closure }}</p>
					<p>{!! lineBreak($travel->description) !!}</p>
					<a class="button fas fa-eye fa-lg" href="{{ route('travels.show', $travel->id) }}"></a>
				</div>
			@endforeach
			
			<a class="button" href="{{ route('travels.index') }}">Retour</a>
		</section>

		
@endsection