<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 04/11/2017
 * Time: 13:50
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Data;

class ContribuicaoController extends Controller
{
    private $data;
    function __construct(Data $data)
    {
        $this->data = $data;
    }

    function formContribuicao()
    {

        $dados['anos'] = $this->data->ano();
        $dados['meses'] = $this->data->mes();
        $dados['actionPorPeriodo'] = "Home\PagamentoPorPeriodoController@pagamento";
        return view('home.modalCadastroContribuicao')->with('dados', $dados);
    }


}