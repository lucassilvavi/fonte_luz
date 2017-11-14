<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 04/11/2017
 * Time: 13:50
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class ContribuicaoController extends Controller
{
    function formContribuicao()
    {
        $ano = date('Y');
        $dados['anos'] = array($ano => $ano,$ano - 1 => $ano - 1, $ano + 1 => $ano + 1);
        $dados['meses'] = array(1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho",
            7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");

        $dados['actionPorPeriodo'] = "Home\PagamentoPorPeriodoController@pagamento";
        return view('home.modalCadastroContribuicao')->with('dados', $dados);
    }


}