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
    use App\Repositories\ControleContribuicaoRepository;

    class ContribuicaoController extends Controller
    {
        private $data;
        private $controleContribuicaoRepository;

        function __construct(Data $data,
                             ControleContribuicaoRepository $controleContribuicaoRepository)
        {
            $this->data = $data;
            $this->controleContribuicaoRepository = $controleContribuicaoRepository;
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

            return view('home.modalEditarContribuicao')->with('dados', $dados);
        }


    }