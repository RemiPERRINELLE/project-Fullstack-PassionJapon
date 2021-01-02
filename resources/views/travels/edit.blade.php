@extends('template')

@section('content')
    <form class="text-center border border-light p-5" action="{{ route('travels.update', $travel->id)}}" method="POST">
        @csrf
        @method('PUT')
        <p class="h4 mb-4">Modifier un voyage</p>

        <!-- CATEGORY -->
        <div class="field mb-4">
            <label class="label">Catégorie</label>
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
        <textarea class="form-control rounded-1 mt-4 @error('descritpion') is-invalid @enderror" name="description" rows="10" placeholder="Description">{{ old('description', $travel->description) }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- PRICE -->
        <input type="text" name="price" class="form-control mt-4 @error('price') is-invalid @enderror" value="{{ old('price', $travel->price) }}" placeholder="Prix">
        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- STOCK -->
        <input type="text" name="stock" class="form-control mt-4 @error('stock') is-invalid @enderror" value="{{ old('stock', $travel->stock) }}" placeholder="Stock">
        @error('stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- DATE START -->
        <input type="date" name="date_start" class="datepicker form-control mt-4 @error('date_start') is-invalid @enderror" value="{{ old('date_start', $travel->date_start) }}" placeholder="Date de départ">
        @error('date_start')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <!-- DATE END -->
        <input type="date" name="date_end" class="datepicker form-control mt-4 @error('date_end') is-invalid @enderror" value="{{ old('date_end', $travel->date_end) }}" placeholder="Date de fin">
        @error('date_end')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- DATE CLOSURE -->
        <input type="date" name="date_closure" class="datetimepicker form-control mt-4 @error('date_closure') is-invalid @enderror" value="{{ old('date_closure', $travel->date_closure) }}" placeholder="Date de clôture">
        @error('date_closure')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- CLOSURED -->
        <select name="closured" class="form-control mt-4 mb-4" required>
            <option value="No" @if( old('closured', $travel->closured) == 'No') selected @endif>Non</option>
            <option value="Yes" @if( old('closured', $travel->closured) == 'Yes') selected @endif>Oui</option>
        </select>
        @error('closured')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <!-- Send button -->
        <button class="button" type="submit">Modifier</button>

        <a class="button" href="{{ route('travels.index') }}">Retour</a>

    </form>
@endsection