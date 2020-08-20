@extends('template')

@section('content')
    <form class="text-center border border-light p-5" action="{{ route('travels.store')}}" method="POST">
        @csrf
        <p class="h4 mb-4">Créer un voyage</p>


        <!-- DATE START -->
        <input type="date" name="date_start" class="datepicker form-control @error('date_start') is-invalid @enderror" value="{{ old('date_start') }}" placeholder="Date de départ">
        @error('date_start')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <!-- DATE END -->
        <input type="date" name="date_end" class="datepicker form-control mt-4 @error('date_end') is-invalid @enderror" value="{{ old('date_end') }}" placeholder="Date de fin">
        @error('date_end')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- STOCK -->
        <input type="text" name="stock" class="form-control mt-4 @error('stock') is-invalid @enderror" value="{{ old('stock') }}" placeholder="Stock">
        @error('stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- PRICE -->
        <input type="text" name="price" class="form-control mt-4 @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Prix">
        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- DESCRIPTION -->
        <textarea class="form-control rounded-1 mt-4 @error('description') is-invalid @enderror" name="description" rows="10" placeholder="Description">{{ old('description') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror   

        <!-- DATE CLOSURE -->
        <input type="date" name="date_closure" class="datetimepicker form-control mt-4 @error('date_closure') is-invalid @enderror" value="{{ old('date_closure') }}" placeholder="Date de clôture">
        @error('date_closure')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- CATEGORY -->
        <div class="field mt-4 mb-4">
            <label class="label">Catégorie</label>
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
        <button class="button" type="submit">Créer</button>

        <a class="button" href="{{ route('travels.index') }}">Retour</a>

    </form>
@endsection
