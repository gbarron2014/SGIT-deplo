<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'max:20', 'confirmed'],
        ],[
            'name.required'=>'¡El nombre es requerido!',
            'name.string'=>'¡Los datos del nombre no son correctos! Ingresa valores validos',
            'name.min'=>'¡El nombre tiene un mínimo de 3 caracteres!',            
            'name.max'=>'¡El nombre tiene un máximo de 50 caracteres!',


            'email.required'=>'¡El correo electrónico es requerido!',
            'email.email'=>'¡Este no es un correo electrónico!',
            'email.string'=>'¡Los datos del correo electrónico no son correctos! Ingresa valores validos',
            'email.max'=>'¡El correo electrónico tiene un máximo de 50 caracteres!',
            'email.unique'=>'¡Este correo electrónico ya se encuentra registrado!',

            'password.required'=>'¡La contraseña es requerida! No puede tener valores nulos o espacios.',
            'password.string'=>'¡Los datos del nombre no son correctos! Ingresa valores validos',
            'password.min'=>'¡La contraseña tiene un mínimo de 4 caracteres!',
            'password.max'=>'¡La contraseña tiene un máximo de 20 caracteres!',
            'password.confirmed'=>'¡Ambas contraseñas deben coincidir!',
    ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
