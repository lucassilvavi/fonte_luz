<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 23/09/2017
 * Time: 15:36
 */

namespace App\Http\Controllers\Perfil;

use App\Http\Requests\TrabalhoRequest;
use App\Services\ProfissoesService;
use App\Http\Requests\GenericaRequest;

class TrabalhoController
{
    function __construct(ProfissoesService $profissoesService)
    {
        $this->profissoesService = $profissoesService;
    }

    public function cadastrarTrabalho(TrabalhoRequest $request)
    {
        return $this->profissoesService->novo($request->all());
    }

    function formDesableHabilidade($co_seq_usuario_profissao)
    {
        $dados['co_seq_usuario_profissao'] = $co_seq_usuario_profissao;
        $dados['action'] = 'Perfil\TrabalhoController@desableHabilidade';
        return view('perfil.modalDesableHabilidade')->with('dados', $dados);
    }

    function desableHabilidade(GenericaRequest $request)
    {
        return $this->profissoesService->desativarHabilidade($request->get('co_seq_usuario_profissao'));
    }
}