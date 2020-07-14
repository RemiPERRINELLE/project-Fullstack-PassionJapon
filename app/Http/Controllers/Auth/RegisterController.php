<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\{User, Media};
use App\Http\Requests\Users as UsersRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'pseudo' => ['required', 'string', 'max:255'],
            'avatar' => ['required', 'image', 'max:2000'],
            'name' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'sexe' => ['required', 'string', 'max:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'adress' => ['nullable', 'string'],
            'postal_code' => ['required', 'integer'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\{User, Media}
     */
    protected function create(array $data)
    {
        $avatar = $data['avatar'];
        $avatarName = $avatar->getClientOriginalName();
        $user = User::create([
            'pseudo' => $data['pseudo'],
            'avatar' => $avatarName,
            'name' => $data['name'],
            'firstname' => $data['firstname'],
            'sexe' => $data['sexe'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'adress' => $data['adress'],
            'postal_code' => $data['postal_code'],
            'city' => $data['city'],
            'country' => $data['country'],
            'phone' => $data['phone'],
        ]);
        // $media = Media::create([
        //     "image" => $avatarName,
        // ]);
        $path = public_path().'/uploads/users/' . $user->id;
        File::makeDirectory($path);
        $avatar->move('uploads/users/' . $user->id, $avatarName);
        return $user;
    }
}
