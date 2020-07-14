@extends('template')

@section('content')
    <form class="text-center border border-light p-5" action="{{ route('travels.store')}}" method="POST">
        @csrf
        <p class="h4 mb-4">Créer un voyage</p>


        <!-- DATE START -->
        <input type="date" name="date_start" class="datepicker form-control mb-4" value="{{ old('date_start') }}" placeholder="Date de départ">
        @error('date_start')
            <p>{{ $message }}</p>
        @enderror
        
        <!-- DATE END -->
        <input type="date" name="date_end" class="datepicker form-control mb-4" value="{{ old('date_end') }}" placeholder="Date de fin">
        @error('date_end')
            <p>{{ $message }}</p>
        @enderror

        <!-- STOCK -->
        <input type="text" name="stock" class="form-control mb-4" value="{{ old('stock') }}" placeholder="Stock">
        @error('stock')
            <p>{{ $message }}</p>
        @enderror

        <!-- PRICE -->
        <input type="text" name="price" class="form-control mb-4" value="{{ old('price') }}" placeholder="Prix">
        @error('price')
            <p>{{ $message }}</p>
        @enderror

        <!-- DESCRIPTION -->
        <div class="form-group">
            <textarea class="form-control rounded-0" name="description" rows="10" placeholder="Description">{{ old('description') }}</textarea>
        </div>
        @error('description')
            <p>{{ $message }}</p>
        @enderror   

        <!-- DATE CLOSURE -->
        <input type="date" name="date_closure" class="datetimepicker form-control mb-4" value="{{ old('date_closure') }}" placeholder="Date de clôture">
        @error('date_closure')
            <p>{{ $message }}</p>
        @enderror

        <!-- CLOSURED -->
        <input type="text" name="closured" class="form-control mb-4" value="{{ old('closured') }}" placeholder="Clôturé">
        @error('closured')
            <p>{{ $message }}</p>
        @enderror

        <!-- CATEGORY -->
        {{-- <input type="text" name="category" class="form-control mb-4" value="{{ old('category') }}" placeholder="N°Catégorie"> --}}
        <div class="field">
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
            <p>{{ $message }}</p>
        @enderror

        
        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit">Créer</button>

        <a class="button" href="{{ route('travels.index') }}">Retour</a>

    </form>
@endsection
{{-- @extends('template')

@section('content')
    <form class="text-center border border-light p-5" action="{{ route('travels.store')}}" method="POST">
        @csrf
        <p class="h4 mb-4">Créer un voyage</p>

        <!-- CATEGORY -->
        <input type="text" name="category" class="form-control mb-4" value="{{ old('category') }}" placeholder="N°Catégorie">
        <div class="field">
            <label class="label">Catégorie</label>
            <div class="select">
                <select name="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @error('category')
            <p>{{ $message }}</p>
        @enderror

        <!-- DESCRIPTION -->
        <div class="form-group">
            <textarea class="form-control rounded-0" name="description" rows="10" placeholder="Description">{{ old('description') }}</textarea>
        </div>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <!-- PRICE -->
        <input type="text" name="price" class="form-control mb-4" value="{{ old('price') }}" placeholder="Prix">
        @error('price')
            <p>{{ $message }}</p>
        @enderror

        <!-- STOCK -->
        <input type="text" name="stock" class="form-control mb-4" value="{{ old('stock') }}" placeholder="Stock">
        @error('stock')
            <p>{{ $message }}</p>
        @enderror

        <!-- DATE START -->
        <input type="text" name="date_start" class="form-control mb-4" value="{{ old('date_start') }}" placeholder="Date de départ">
        @error('date_start')
            <p>{{ $message }}</p>
        @enderror
        
        <!-- DATE END -->
        <input type="text" name="date_end" class="form-control mb-4" value="{{ old('date_end') }}" placeholder="Date de fin">
        @error('date_end')
            <p>{{ $message }}</p>
        @enderror

        <!-- DATE CLOSURE -->
        <input type="text" name="date_closure" class="form-control mb-4" value="{{ old('date_closure') }}" placeholder="Date de clôture">
        @error('date_closure')
            <p>{{ $message }}</p>
        @enderror

        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit">Créer</button>

        <a class="button" href="{{ route('travels.index') }}">Retour</a>

    </form>
@endsection --}}