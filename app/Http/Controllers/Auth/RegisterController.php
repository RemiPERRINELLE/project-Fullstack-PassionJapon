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
        if(empty($_POST['g-recaptcha-response'])){
			return Validator::make($data, [
                'g-recaptcha-response' => ['required',],
            ]);
		} else {
			$captcha=$_POST['g-recaptcha-response'];
		}
		$secretKey = env('NOCAPTCHA_SECRET');
		$ip = $_SERVER['REMOTE_ADDR'];
		// post request to server
		$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
		$response = file_get_contents($url);
		$responseKeys = json_decode($response,true);
		// should return JSON with success as true
		if(!$responseKeys["success"]) {
			return Validator::make($data, [
                'g-recaptcha-response' => ['captcha',],
            ]);
		}

        return Validator::make($data, [
            'pseudo' => ['required', 'string', 'max:30'],
            'avatar' => ['image', 'max:2000'],
            'name' => ['required', 'string', 'max:30'],
            'firstname' => ['required', 'string', 'max:30'],
            'sexe' => ['required', 'string', 'max:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'adress' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['required', 'integer'],
            'city' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
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
        $user = User::create([
            'pseudo' => $data['pseudo'],
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
        $path = public_path().'/uploads/users/' . $user->id;
        File::makeDirectory($path);

        if( count($data) == 15 ) {
            $avatar = $data['avatar'];
            $avatarName = $avatar->getClientOriginalName();
            $avatar->move('uploads/users/' . $user->id, $avatarName);
            $user->update([
                'avatar' => $avatarName
            ]);
        }

        return $user;
    }
}
