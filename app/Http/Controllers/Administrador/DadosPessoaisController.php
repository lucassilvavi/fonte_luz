<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 12/10/2017
 * Time: 18:10
 */

namespace App\Http\Controllers\Administrador;

use App\Repositories\UsuarioRepository;

class DadosPessoaisController
{
    private $usuarioRepository;

    function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    function selecionarUsuario()
    {
        $dados['usuarios'] = $this->usuarioRepository->getUsuarioMenosProprio(\Illuminate\Support\Facades\Auth::user()->id);
        return view('administrador.dadosPessoais')->with('dados', $dados);
    }

    function getDadosUsuarios($cpf)
    {
        $dados = $this->usuarioRepository->findBy('nu_cpf', $cpf);

        return $dados;
    }
}