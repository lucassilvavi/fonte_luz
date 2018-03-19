<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 15/03/2018
 * Time: 22:14
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRegister;
use App\Repositories\UnidadeFederativaRepository;
use App\Repositories\UsuarioRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UpdateRegisterController extends Controller
{

    private $unidadeFederativaRepository;
    private $usuarioRepository;
    private $authenticatesUsers;

    public function __construct(UnidadeFederativaRepository $unidadeFederativaRepository,
                                UsuarioRepository $usuarioRepository,
                                AuthenticatesUsers $authenticatesUsers)
    {
        $this->unidadeFederativaRepository = $unidadeFederativaRepository;
        $this->usuarioRepository = $usuarioRepository;
        $this->authenticatesUsers = $authenticatesUsers;
    }

    public function update(UpdateRegister $request)
    {
        $dadosForm = $request->all();

        $dados['no_nome'] = $dadosForm['no_nome'];
        $dados['co_perfil'] = 2;
        $dados['nu_cpf'] = $dadosForm['nu_cpf'];
        $dados['dt_nascimento'] = '2018-02-05';
        $dados['email'] = $dadosForm['email'];
        $dados['logradouro'] = $dadosForm['logradouro'];
        $dados['bairro'] = $dadosForm['bairro'];
        $dados['co_uf'] = $this->unidadeFederativaRepository->getCoUnidade($dadosForm['co_uf']);
        $dados['co_cidade'] = $dadosForm['co_cidade'];
        $dados['vl_contribuicao'] = $this->trataMoeda($dadosForm['vl_contribuicao']);
        $dados['password'] = bcrypt($dadosForm['password']);


        $resultado = $this->usuarioRepository->update($dados, $dadosForm['idUsuario'], 'id');

        if ($resultado == 1) {
            return $this->authenticatesUsers->login($request);
        }

    }


    public function trataMoeda($valor)
    {
        $dinheiro = str_replace('.', '', $valor); // remove o ponto
        return str_replace(',', '.', $dinheiro); // troca a vírgula por ponto
    }
}