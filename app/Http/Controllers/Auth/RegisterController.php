<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

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
            'organization' => 'required',
			'mailingaddress' => 'required',
            'email' => 'required|email|max:255|unique:users',
			'firstname' => 'required',
			'lastname' => 'required',
			'designation' => 'required',
			'phonenumber' => 'required|numeric|MIN:10',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'organization' => $data['organization'],
			'mailingaddress' => $data['mailingaddress'],
			'ntn' => $data['ntn'],
			'firstname' => $data['firstname'],
			'lastname' => $data['lastname'],
			'designation' => $data['designation'],
			'phonenumber' => $data['phonenumber'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
