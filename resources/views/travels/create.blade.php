@extends('template')

@section('content')
    <form class="font-weight-bold border border-light p-5" action="{{ route('travels.store')}}" method="POST">
        @csrf
        <h4 class="text-center font-weight-bold mb-4">Créer un voyage</h4>


        <!-- DATE START -->
        <label for="date_start" class="mt-4">Date de début :</label>
        <input type="date" name="date_start" class="datepicker form-control @error('date_start') is-invalid @enderror" value="{{ old('date_start') }}" placeholder="Date de départ">
        @error('date_start')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <!-- DATE END -->
        <label for="date_end" class="mt-4">Date de fin :</label>
        <input type="date" name="date_end" class="datepicker form-control @error('date_end') is-invalid @enderror" value="{{ old('date_end') }}" placeholder="Date de fin">
        @error('date_end')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- STOCK -->
        <label for="stock" class="mt-4">Stock :</label>
        <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}" placeholder="Stock">
        @error('stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- PRICE -->
        <label for="price" class="mt-4">Prix :</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Prix">
        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- DESCRIPTION -->
        <label for="description" class="mt-4">Description :</label>
        <textarea class="form-control rounded-1 @error('description') is-invalid @enderror" name="description" rows="10" placeholder="Description" max="100000">{{ old('description') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror   

        <!-- DATE CLOSURE -->
        <label for="date_closure" class="mt-4">Date de clôture :</label>
        <input type="date" name="date_closure" class="datetimepicker form-control @error('date_closure') is-invalid @enderror" value="{{ old('date_closure') }}" placeholder="Date de clôture">
        @error('date_closure')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- CATEGORY -->
        <div class="text-center field mt-4 mb-4">
            <label class="label">Catégorie associée :</label>
            <div class="select">
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        
        <!-- Send button -->
        <button class="button mt-4 mb-4" type="submit">Créer</button>

        <a class="button" href="{{ route('travels.index') }}">Retour</a>

    </form>
@endsection
