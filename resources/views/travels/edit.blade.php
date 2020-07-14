@extends('template')

@section('content')
    <form class="text-center border border-light p-5" action="{{ route('travels.update', $travel->id)}}" method="POST">
        @csrf
        @method('PUT')
        <p class="h4 mb-4">Modifier un voyage</p>

        <!-- CATEGORY -->
        {{-- <input type="text" name="category_id" class="form-control mb-4" value="{{ old('category_id', $category->id) }}" placeholder="N°Catégorie"> --}}
        <div class="field">
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
            <p>{{ $message }}</p>
        @enderror

        <!-- DESCRIPTION -->
        <div class="form-group">
            <textarea class="form-control rounded-0" name="description" rows="10" placeholder="Description">{{ old('description', $travel->description) }}</textarea>
        </div>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <!-- PRICE -->
        <input type="text" name="price" class="form-control mb-4" value="{{ old('price', $travel->price) }}" placeholder="Prix">
        @error('price')
            <p>{{ $message }}</p>
        @enderror

        <!-- STOCK -->
        <input type="text" name="stock" class="form-control mb-4" value="{{ old('stock', $travel->stock) }}" placeholder="Stock">
        @error('stock')
            <p>{{ $message }}</p>
        @enderror

        <!-- DATE START -->
        <input type="date" name="date_start" class="datepicker form-control mb-4" value="{{ old('date_start', $travel->date_start) }}" placeholder="Date de départ">
        @error('date_start')
            <p>{{ $message }}</p>
        @enderror
        
        <!-- DATE END -->
        <input type="date" name="date_end" class="datepicker form-control mb-4" value="{{ old('date_end', $travel->date_end) }}" placeholder="Date de fin">
        @error('date_end')
            <p>{{ $message }}</p>
        @enderror

        <!-- DATE CLOSURE -->
        <input type="date" name="date_closure" class="datetimepicker form-control mb-4" value="{{ old('date_closure', $travel->date_closure) }}" placeholder="Date de clôture">
        @error('date_closure')
            <p>{{ $message }}</p>
        @enderror

        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit">Modifier</button>

        <a class="button" href="{{ route('travels.index') }}">Retour</a>

    </form>
@endsection