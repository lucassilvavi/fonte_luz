<?php

namespace App\Http\Controllers\Auth;

use App\Models\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_usuario',
            'password' => 'required|string|min:6|confirmed',
            'cpf' => 'required|string|max:11',
            'dt_nascimento' => 'required',
            'logradouro' => 'required|string|max:55',
            'bairro' => 'required|string|max:55',
//            'uf' => 'required',
//            'cidade' => 'required',
            'valor' => 'required',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $dNnascimento=$this->dateEmMysql( $data['dt_nascimento']);


        return Usuario::create([
            'nome_usuario' => $data['nome'],
            'nu_cpf' => $data['cpf'],
            'dt_nascimento' => $dNnascimento,
            'email' => $data['email'],
            'logradouro' => $data['logradouro'],
            'bairro' => $data['bairro'],
//            'uf' => $data['uf'],
//            'cidade' => $data['cidade'],
            'valor' => $data['valor'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function dateEmMysql($dateSql){
        $ano= substr($dateSql, 6);
        $mes= substr($dateSql, 3,-5);
        $dia= substr($dateSql, 0,-8);
        return $ano."-".$mes."-".$dia;
    }
}
