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
use Illuminate\Http\Request;
use App\Repositories\ControleContribuicaoRepository;
use App\Services\ControleContribuicaoService;

class ContribuicaoController extends Controller
{
    private $data;
    private $controleContribuicaoRepository;
    private $controleContribuicaoService;

    function __construct(Data $data,
                         ControleContribuicaoRepository $controleContribuicaoRepository,
                         ControleContribuicaoService $controleContribuicaoService)
    {
        $this->data = $data;
        $this->controleContribuicaoRepository = $controleContribuicaoRepository;
        $this->controleContribuicaoService = $controleContribuicaoService;
    }

    function formContribuicao()
    {
        $dados['anos'] = $this->data->ano();
        $dados['meses'] = $this->data->mes();
        $dados['actionPorPeriodo'] = "Home\PagamentoController@pagamentoPeriodo";
        $dados['actionPorMes'] = "Home\PagamentoController@pagamentoMes";
        return view('home.modalCadastroContribuicao')->with('dados', $dados);
    }

    function formEditarContribuicao($co_seq_controle_contribuicao)
    {
        $dados['contribuicao'] = $this->controleContribuicaoRepository->findBy('co_seq_controle_contribuicao', $co_seq_controle_contribuicao);
        $dados['anos'] = $this->data->ano();
        $dados['meses'] = $this->data->mes();
        $dados['action'] = "Home\PagamentoController@editarMensalidade";

        return view('home.modalEditarContribuicao')->with('dados', $dados);
    }

    function formExcluirContribuicao($co_seq_controle_contribuicao)
    {
        $dados['co_seq_controle_contribuicao'] = $co_seq_controle_contribuicao;

        return view('home.modalExcluirContribuicao')->with('dados', $dados);
    }

    public function excluirContribuicao($co_seq_controle_contribuicao)
    {

        $contribuicao = $this->controleContribuicaoRepository->
        findBy('co_seq_controle_contribuicao', $co_seq_controle_contribuicao);
        if (!empty($contribuicao->dt_confirmacao_financeiro)) {
            return 'Confirmado';
        }
        return $this->controleContribuicaoService->desativar($contribuicao->co_seq_controle_contribuicao);
    }


}