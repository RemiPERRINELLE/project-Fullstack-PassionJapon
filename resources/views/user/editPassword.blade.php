@extends('template')

@section('content')
    @auth
        @if( Auth::user()->id == $user->id )
            <div class="row justify-content-center mb-4 mt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header h4 mb-4 text-center">{{ __('Modifier le mot de passe') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('update.password', $user->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="currentPassword" class="col-md-4 col-form-label text-md-right">Mot de passe actuel</label>

                                    <div class="col-md-6">
                                        <input id="currentPassword" type="password" class="form-control" name="currentPassword" required>

                                        @if (session()->has('currentPassword-error'))
                                            <span class="text-danger">
                                                <strong>{{ session('currentPassword-error') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="newPassword" class="col-md-4 col-form-label text-md-right">Nouveau mot de passe</label>

                                    <div class="col-md-6">
                                        <input id="newPassword" type="password" class="form-control" name="newPassword" required>


                                        @if ($errors->has('newPassword'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('newPassword') }}</strong>
                                            </span>
                                        @elseif (session()->has('newPassword-error'))
                                            <span class="text-danger">
                                                <strong>{{ session('newPassword-error') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="newPassword_confirmation" class="col-md-4 col-form-label text-md-right">Confirmer le mot de passe</label>

                                    <div class="col-md-6">
                                        <input id="newPassword_confirmation" type="password" class="form-control" name="newPassword_confirmation" required>
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
            <p class="stop">&#x26A0;</p>
            <p class="noAccess">Vous n'avez pas accès à cette page.</p>
        @endif
    @else
        <p class="stop">&#x26A0;</p>
        <p class="noAccess">Vous n'avez pas accès à cette page.</p>
    @endauth
@endsection




