@extends('template')

@section('content')
    @auth
        @if( Auth::user()->id == $user->id )
            <div class="row justify-content-center mb-4 mt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header h4 mb-4 text-center">{{ __('Modifier le profil') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="pseudo" class="col-md-4 col-form-label text-md-right">{{ __('Pseudo') }}</label>

                                    <div class="col-md-6">
                                        <input id="pseudo" type="text" class="form-control calligraf @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ old('pseudo', $user->pseudo) }}" required autocomplete="pseudo">

                                        @error('pseudo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                                    <div class="col-md-6">
                                        <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" autocomplete="avatar" accept="image/*">

                                        @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @if(session()->has('image-error'))
                                            <p>{{ session('image-error') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control calligraf @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                                    <div class="col-md-6">
                                        <input id="firstname" type="text" class="form-control calligraf @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname', $user->firstname) }}" required autocomplete="firstname">

                                        @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="sexe" class="col-md-4 col-form-label text-md-right">{{ __('Sexe') }}</label>

                                    <div class="col-md-6">
                                        <select name="sexe" class="form-control calligraf" required>
                                            <option class="calligraf" value="H" @if( old('sexe', $user->sexe) == 'H') selected @endif>Homme</option>
                                            <option class="calligraf" value="F" @if( old('sexe', $user->sexe) == 'F') selected @endif>Femme</option>
                                        </select>

                                        @error('sexe')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Adress') }}</label>

                                    <div class="col-md-6">
                                        <input id="adress" type="text" class="form-control calligraf @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress', $user->adress) }}" autocomplete="adress">
                                        @error('adress')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('Postal_code') }}</label>

                                    <div class="col-md-6">
                                        <input id="postal_code" type="text" class="form-control calligraf @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" required autocomplete="postal_code">

                                        @error('postal_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text" class="form-control calligraf @error('city') is-invalid @enderror" name="city" value="{{ old('city', $user->city) }}" required autocomplete="city">

                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                    <div class="col-md-6">
                                        <input id="country" type="text" class="form-control calligraf @error('country') is-invalid @enderror" name="country" value="{{ old('country', $user->country) }}" required autocomplete="country">

                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control calligraf @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" autocomplete="phone">

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="button">
                                            {{ __('Modifier') }}
                                        </button>
                                    </div>
                                </div>
                                <a class="button" href="{{ route('profile') }}">Retour</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>Vous n'avez pas accès à cette page.</p>
        @endif
    @else
        <p>Vous n'avez pas accès à cette page.</p>
    @endauth
@endsection
