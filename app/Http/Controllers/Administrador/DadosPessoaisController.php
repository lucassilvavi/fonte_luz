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
        $dados = $this->usuarioRepository->getUsuarioDaCarga($cpf);
        if (count($dados) >= 1) {
            $dados[0]['dt_nascimento'] = $this->data->formatarDataBR($dados[0]['dt_nascimento']);
            $dados[0]['vl_contribuicao'] = \JansenFelipe\Utils\Utils::moeda($dados[0]['vl_contribuicao'],"");

            return $dados[0];
        }
        return "naoPossui";

    }

    public function trataMoeda($valor)
    {
        $dinheiro = str_replace('.', '', $valor); // remove o ponto
        return str_replace(',', '.', $dinheiro); // troca a vírgula por ponto
    }
}