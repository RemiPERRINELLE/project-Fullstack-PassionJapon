@extends('layouts.app')

@section('content')
    @auth
        @if( Auth::user()->id == $user->id )
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Modifier') }}</div>
                        {{-- <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('update.password', $user->id) }}">
                                @csrf
        
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label for="new-password" class="col-md-4 control-label">Current Password</label>
        
                                    <div class="col-md-6">
                                        <input id="current-password" type="password" class="form-control" name="current-password" required>
        
                                        @if (session()->has('currentPassword-error'))
                                            <span class="help-block">
                                                <strong>{{ session('currentPassword-error') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                    <label for="new-password" class="col-md-4 control-label">New Password</label>
        
                                    <div class="col-md-6">
                                        <input id="new-password" type="password" class="form-control" name="new-password" required>
        
                                        @if ($errors->has('new-password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('new-password') }}</strong>
                                            </span>
                                        @elseif (session()->has('newPassword-error'))
                                            <span class="help-block">
                                                <strong>{{ session('newPassword-error') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
        
                                    <div class="col-md-6">
                                        <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Change Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
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
                                        <button type="submit" class="btn btn-primary">
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




