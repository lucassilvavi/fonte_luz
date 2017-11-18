<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 11/11/2017
 * Time: 17:12
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormContribuicaoPorPeriodoRequest;
use App\Services\ControleContribuicaoService;

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
        return $this->controleContribuicaoService->novo($request->all());
    }
}