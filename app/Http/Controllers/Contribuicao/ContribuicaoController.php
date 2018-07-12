<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 04/11/2017
 * Time: 13:50
 */

namespace App\Http\Controllers\Contribuicao;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Data;
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
        $dados['actionPorPeriodo'] = "cadastroMensalidadePorPeriodo";
        $dados['actionPorMes'] = "cadastroMensalidadePorMes";
        return view('contribuicao.modalCadastroContribuicao')->with('dados', $dados);
    }

    function formEditarContribuicao($co_seq_controle_contribuicao)
    {
        $dados['contribuicao'] = $this->controleContribuicaoRepository->findBy('co_seq_controle_contribuicao', $co_seq_controle_contribuicao);
        $dados['anos'] = $this->data->ano();
        $dados['meses'] = $this->data->mes();
        $dados['action'] = "Contribuicao\PagamentoController@editarMensalidade";

        return view('contribuicao.modalEditarContribuicao')->with('dados', $dados);
    }

    function formExcluirContribuicao($co_seq_controle_contribuicao)
    {
        $dados['co_seq_controle_contribuicao'] = $co_seq_controle_contribuicao;

        return view('contribuicao.modalExcluirContribuicao')->with('dados', $dados);
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