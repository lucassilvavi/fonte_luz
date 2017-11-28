<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 11/11/2017
 * Time: 17:12
 */

namespace App\Http\Controllers\Contribuicao;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormContribuicaoPorPeriodoRequest;
use App\Http\Requests\FormContribuicaoPorMes;
use App\Services\ControleContribuicaoService;
use App\Http\Requests\FormEditarContribuicaoRequest;


class PagamentoController extends Controller
{
    private $controleContribuicaoService;

    function __construct(ControleContribuicaoService $controleContribuicaoService)
    {
        $this->controleContribuicaoService = $controleContribuicaoService;
    }

    function pagamentoPeriodo(FormContribuicaoPorPeriodoRequest $request)
    {
        if (!$request->get('comprovante')) {
            return '{"operacao":false}';
        }
        return $this->controleContribuicaoService->novoPorPeriodo($request->all());
    }
    function pagamentoMes(FormContribuicaoPorMes $request)
    {
        if (!$request->get('comprovante')) {
            return '{"operacao":false}';
        }
        return $this->controleContribuicaoService->novoPorMes($request->all());
    }
    function editarMensalidade(FormEditarContribuicaoRequest $request){
      return $this->controleContribuicaoService->editar($request->all());
    }
}