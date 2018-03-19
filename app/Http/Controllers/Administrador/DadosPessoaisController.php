<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 12/10/2017
 * Time: 18:10
 */

namespace App\Http\Controllers\Administrador;

use App\Repositories\UsuarioRepository;
use App\Http\Controllers\Data;


class DadosPessoaisController
{
    private $usuarioRepository;
    private $data;

    function __construct(UsuarioRepository $usuarioRepository,
                         Data $data)
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->data = $data;
    }

    function selecionarUsuario()
    {
        $dados['usuarios'] = $this->usuarioRepository->getUsuarioMenosProprio(\Illuminate\Support\Facades\Auth::user()->id);
        return view('administrador.dadosPessoais')->with('dados', $dados);
    }

    function getDadosUsuarios($cpf)
    {
        $dados = $this->usuarioRepository->findBy('nu_cpf', $cpf);
        $dados['dt_nascimento'] = $this->data->formatarDataBR($dados['dt_nascimento']);
        return $dados;
    }
}