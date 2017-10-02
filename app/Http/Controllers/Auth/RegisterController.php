<?php

namespace App\Http\Controllers\Auth;

use App\Models\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Repositories\UnidadeFederativaRepository;

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
    public function __construct(UnidadeFederativaRepository $unidadeFederativaRepository)
    {
        $this->middleware('guest');
        $this->unidadeFederativaRepository = $unidadeFederativaRepository;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'no_nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_usuario',
            'password' => 'required|string|min:6|confirmed',
            'nu_cpf' => 'required|string|max:11',
            'dt_nascimento' => 'required',
            'logradouro' => 'required|string|max:55',
            'bairro' => 'required|string|max:55',
            'co_uf' => 'required',
            'co_cidade' => 'required',
            'vl_contribuicao' => 'required',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return Usuario::create([
            'no_nome' => $data['no_nome'],
            'co_perfil' => 4,
            'nu_cpf' => $data['nu_cpf'],
            'dt_nascimento' => $this->dateEmMysql($data['dt_nascimento']),
            'email' => $data['email'],
            'logradouro' => $data['logradouro'],
            'bairro' => $data['bairro'],
            'co_uf' => $this->unidadeFederativaRepository->getCoUnidade($data['co_uf']),
            'co_cidade' => $data['co_cidade'],
            'vl_contribuicao' => $this->trataMoeda($data['vl_contribuicao']),
            'password' => bcrypt($data['password']),
        ]);
    }

    public function dateEmMysql($dateSql)
    {
        $ano = substr($dateSql, 6);
        $mes = substr($dateSql, 3, -5);
        $dia = substr($dateSql, 0, -8);
        return $ano . "-" . $mes . "-" . $dia;
    }

    public function trataMoeda($valor)
    {
        $dinheiro = str_replace('.', '', $valor); // remove o ponto
        return str_replace(',', '.', $dinheiro); // troca a vírgula por ponto
    }
}
