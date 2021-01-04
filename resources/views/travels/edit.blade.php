@extends('template')

@section('content')
    <form class="font-weight-bold border border-light p-5" action="{{ route('travels.update', $travel->id)}}" method="POST">
        @csrf
        @method('PUT')
        <h4 class="text-center font-weight-bold mb-4">Modifier un voyage</h4>

        <!-- CATEGORY -->
        <div class="field mt-4">
            <label class="label">Catégorie associée :</label>
            <div class="select">
                <select name="category_id">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ (old('category_id', $category->id) == $cat->id) ? 'selected' : ''}}>{{ $cat->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- DESCRIPTION -->
        <label for="description" class="mt-4">Description :</label>
        <textarea class="form-control rounded-1 @error('descritpion') is-invalid @enderror" name="description" rows="10" placeholder="Description" max="100000">{{ old('description', $travel->description) }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- PRICE -->
        <label for="price" class="mt-4">Prix :</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $travel->price) }}" placeholder="Prix">
        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- STOCK -->
        <label for="stock" class="mt-4">Stock :</label>
        <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $travel->stock) }}" placeholder="Stock">
        @error('stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- DATE START -->
        <label for="date_start" class="mt-4">Date de début :</label>
        <input type="date" name="date_start" class="datepicker form-control @error('date_start') is-invalid @enderror" value="{{ old('date_start', $travel->date_start) }}" placeholder="Date de départ">
        @error('date_start')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <!-- DATE END -->
        <label for="date_end" class="mt-4">Date de fin :</label>
        <input type="date" name="date_end" class="datepicker form-control @error('date_end') is-invalid @enderror" value="{{ old('date_end', $travel->date_end) }}" placeholder="Date de fin">
        @error('date_end')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- DATE CLOSURE -->
        <label for="date_closure" class="mt-4">Date de clôture :</label>
        <input type="text" name="date_closure" class="datetimepicker form-control @error('date_closure') is-invalid @enderror" value="{{ old('date_closure', $travel->date_closure) }}" placeholder="Date de clôture">
        @error('date_closure')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- CLOSURED -->
        <label for="closured" class="mt-4">Clôturé :</label>
        <select name="closured" class="form-control mb-4" required>
            <option value="No" @if( old('closured', $travel->closured) == 'No') selected @endif>Non</option>
            <option value="Yes" @if( old('closured', $travel->closured) == 'Yes') selected @endif>Oui</option>
        </select>
        @error('closured')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- Send button -->
        <button class="button mt-4 mb-4" type="submit">Modifier</button>

        <a class="button" href="{{ route('travels.index') }}">Retour</a>

    </form>
@endsection