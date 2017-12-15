<?php
    /**
     * Created by PhpStorm.
     * User: lucas
     * Date: 28/11/2017
     * Time: 20:24
     */

    namespace App\Http\Controllers\Tesouraria;


    use App\Http\Controllers\Controller;
    use App\Repositories\UsuarioRepository;
    use Illuminate\Http\Request;
    use App\Repositories\ControleContribuicaoRepository;
    use App\Repositories\ComprovanteRepository;
    use App\Services\ControleContribuicaoService;

    class IndexController extends Controller
    {

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        private $usuarioRepository;
        private $controleContribuicaoRepository;
        private $comprovanteRepository;
        private $controleContribuicaoService;

        public function __construct(UsuarioRepository $usuarioRepository,
                                    ControleContribuicaoRepository $controleContribuicaoRepository,
                                    ComprovanteRepository $comprovanteRepository,
                                    ControleContribuicaoService $controleContribuicaoService)
        {
            $this->usuarioRepository = $usuarioRepository;
            $this->controleContribuicaoRepository = $controleContribuicaoRepository;
            $this->comprovanteRepository = $comprovanteRepository;
            $this->controleContribuicaoService = $controleContribuicaoService;
            $this->middleware('auth');

        }

        /**
         *
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $dados['usuarios'] = $this->usuarioRepository->all();

            return view('tesouraria.index')->with('dados', $dados);
        }

        public function valueNull($parament)
        {
            if ($parament == "null") {
                return $parament = null;
            }
            return $parament;
        }

        public function getContribuicoes($classificacaoPagamentoS, $periodeDeS, $periodeAteS, $membroS)
        {
            $classificacaoPagamento = self::valueNull($classificacaoPagamentoS);
            $periodeDe = self::valueNull($periodeDeS);
            $periodeAte = self::valueNull($periodeAteS);
            $membro = self::valueNull($membroS);


            //tenho que escrever uma função pra me trazer a data formatada
            if (!empty($periodeDe) && !empty($periodeAte) && empty($membro) && !isset($classificacaoPagamento)) {
                $de = self::dataFomatada($periodeDe);
                $ate = self::dataFomatada($periodeAte);
                $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao WHERE dt_contribuicao >= $de AND dt_contribuicao <= $ate");
            } elseif (!empty($periodeDe) && empty($periodeAte) && empty($membro) && !isset($classificacaoPagamento)) {
                $de = self::dataFomatada($periodeDe);
                $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao >= $de");
            } elseif (empty($periodeDe) && !empty($periodeAte) && empty($membro) && !isset($classificacaoPagamento)) {
                $ate = self::dataFomatada($periodeAte);
                $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao <= $ate");
            } else if (!empty($periodeDe) && !empty($periodeAte) && !empty($membro) && !isset($classificacaoPagamento)) {
                $de = self::dataFomatada($periodeDe);
                $ate = self::dataFomatada($periodeAte);
                $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao WHERE dt_contribuicao >= $de AND dt_contribuicao <= $ate AND ID = " . $membro);
            } elseif (!empty($periodeDe) && empty($periodeAte) && !empty($membro) && !isset($classificacaoPagamento)) {
                $de = self::dataFomatada($periodeDe);
                $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao >= $de  AND ID = " . $membro);
            } elseif (empty($periodeDe) && !empty($periodeAte) && !empty($membro) && !isset($classificacaoPagamento)) {
                $ate = self::dataFomatada($periodeAte);
                $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao <= $ate AND ID = " . $membro);
            } elseif (empty($periodeDe) && empty($periodeAte) && !empty($membro) && !isset($classificacaoPagamento)) {
                $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE ID = " . $membro);
            } elseif (empty($periodeDe) && empty($periodeAte) && empty($membro) && isset($classificacaoPagamento)) {
                if ($classificacaoPagamento == "Pendente de Validação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL");
                } elseif ($classificacaoPagamento == "Pagamentos Validados") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NOT NULL");
                } elseif ($classificacaoPagamento == "Pendente com Observação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL AND DS_OBSERVACAO_FINANCEIRO IS NOT NULL");
                } elseif ($classificacaoPagamento == "Reprovado") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_REPROVACAO_FINANCEIRO IS NOT NULL");
                }
            } elseif (!empty($periodeDe) && empty($periodeAte) && empty($membro) && isset($classificacaoPagamento)) {
                $de = self::dataFomatada($periodeDe);
                if ($classificacaoPagamento == "Pendente de Validação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL AND dt_contribuicao >= $de");
                } elseif ($classificacaoPagamento == "Pagamentos Validados") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NOT NULL AND dt_contribuicao >= $de");
                } elseif ($classificacaoPagamento == "Pendente com Observação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL AND DS_OBSERVACAO_FINANCEIRO IS NOT NULL AND dt_contribuicao >= $de");
                } elseif ($classificacaoPagamento == "Reprovado") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_REPROVACAO_FINANCEIRO IS NOT NULL AND dt_contribuicao >= $de");
                }
            } elseif (empty($periodeDe) && !empty($periodeAte) && empty($membro) && isset($classificacaoPagamento)) {
                $ate = self::dataFomatada($periodeAte);
                if ($classificacaoPagamento == "Pendente de Validação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("where dt_confirmacao_financeiro is null and dt_reprovacao_financeiro is null and dt_contribuicao <= $ate");

                } elseif ($classificacaoPagamento == "Pagamentos Validados") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NOT NULL AND dt_contribuicao <= $ate");
                } elseif ($classificacaoPagamento == "Pendente com Observação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL AND DS_OBSERVACAO_FINANCEIRO IS NOT NULL AND dt_contribuicao <= $ate");
                } elseif ($classificacaoPagamento == "Reprovado") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_REPROVACAO_FINANCEIRO IS NOT NULL AND dt_contribuicao <= $ate");
                }
            } elseif (!empty($periodeDe) && !empty($periodeAte) && empty($membro) && isset($classificacaoPagamento)) {
                $ate = self::dataFomatada($periodeAte);
                $de = self::dataFomatada($periodeDe);
                if ($classificacaoPagamento == "Pendente de Validação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL AND dt_contribuicao >= $de AND dt_contribuicao <= $ate");
                } elseif ($classificacaoPagamento == "Pagamentos Validados") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NOT NULL  AND  dt_contribuicao >= $de AND dt_contribuicao <= $ate");
                } elseif ($classificacaoPagamento == "Pendente com Observação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL AND DS_OBSERVACAO_FINANCEIRO IS NOT NULL  AND  dt_contribuicao >= $de AND dt_contribuicao <= $ate");
                } elseif ($classificacaoPagamento == "Reprovado") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_REPROVACAO_FINANCEIRO IS NOT NULL  AND  dt_contribuicao >= $de AND dt_contribuicao <= $ate");
                }

            } elseif (!empty($periodeDe) && empty($periodeAte) && !empty($membro) && isset($classificacaoPagamento)) {
                $de = self::dataFomatada($periodeDe);
                if ($classificacaoPagamento == "Pendente de Validação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL AND dt_contribuicao >= $de AND ID = " . $membro);
                } elseif ($classificacaoPagamento == "Pagamentos Validados") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NOT NULL AND dt_contribuicao >= $de AND ID = " . $membro);
                } elseif ($classificacaoPagamento == "Pendente com Observação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL AND DS_OBSERVACAO_FINANCEIRO IS NOT NULL AND dt_contribuicao >= $de AND ID = " . $membro);
                } elseif ($classificacaoPagamento == "Reprovado") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_REPROVACAO_FINANCEIRO IS NOT NULL AND dt_contribuicao >= $de AND ID = " . $membro);
                }
            } elseif (empty($periodeDe) && !empty($periodeAte) && !empty($membro) && isset($classificacaoPagamento)) {
                $ate = self::dataFomatada($periodeAte);
                if ($classificacaoPagamento == "Pendente de Validação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL AND dt_contribuicao <= $ate AND ID = " . $membro);
                } elseif ($classificacaoPagamento == "Pagamentos Validados") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NOT NULL AND dt_contribuicao <= $ate AND ID = " . $membro);
                } elseif ($classificacaoPagamento == "Pendente com Observação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL AND DS_OBSERVACAO_FINANCEIRO IS NOT NULL AND dt_contribuicao <= $ate AND ID = " . $membro);
                } elseif ($classificacaoPagamento == "Reprovado") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_REPROVACAO_FINANCEIRO IS NOT NULL AND dt_contribuicao <= $ate AND ID = " . $membro);
                }
            } elseif (!empty($periodeDe) && !empty($periodeAte) && !empty($membro) && isset($classificacaoPagamento)) {
                $ate = self::dataFomatada($periodeAte);
                $de = self::dataFomatada($periodeDe);
                if ($classificacaoPagamento == "Pendente de Validação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL AND  dt_contribuicao >= $de AND dt_contribuicao <= $ate AND ID = " . $membro);
                } elseif ($classificacaoPagamento == "Pagamentos Validados") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NOT NULL  AND  dt_contribuicao >= $de AND dt_contribuicao <= $ate AND ID = " . $membro);
                } elseif ($classificacaoPagamento == "Pendente com Observação") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL AND DS_OBSERVACAO_FINANCEIRO IS NOT NULL  AND  dt_contribuicao >= $de AND dt_contribuicao <= $ate AND ID = " . $membro);
                } elseif ($classificacaoPagamento == "Reprovado") {
                    $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE DT_REPROVACAO_FINANCEIRO IS NOT NULL  AND  dt_contribuicao >= $de AND dt_contribuicao <= $ate AND ID = " . $membro);
                }
            } else {
                $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao("WHERE 1");
            }
            return view('tesouraria.dataTableContribuicao')->with('dados', $dados);

        }

        public function dataFomatada($data)
        {
            $data = str_replace("-", "-", $data);
            $dataForm = date('Y-m-d', strtotime($data));
            return "'$dataForm'";
        }

        public function formComprovante($co_seq_controle_contribuicao)
        {
            $dados['comprovantes'] = $this->comprovanteRepository->getComprovantes($co_seq_controle_contribuicao);
            $dados['baixar'] = "/comprovantes/";
            return view('tesouraria.comprovante')->with('dados', $dados);
        }

        public function formObservacao($co_seq_controle_contribuicao)
        {

            $dados['contribuicao'] = $this->controleContribuicaoRepository->find($co_seq_controle_contribuicao);
            $dados['action'] = 'Tesouraria\IndexController@saveObservacao';
            return view('tesouraria.observacao')->with('dados', $dados);
        }

        public function saveObservacao(Request $request)
        {
            $dados['form'] = $request->all();
            return $this->controleContribuicaoService->editarObservacao(trim($dados['form']['observacao']), $dados['form']['co_seq_controle_contribuicao']);
        }

        public function formConfirmaContribuicao($co_seq_controle_contribuicao)
        {
            $dados = $co_seq_controle_contribuicao;
            return view('tesouraria.modalConfirmaContribuicao')->with('dados', $dados);
        }

        public function saveConfirmacaoContribuicao($co_seq_controle_contribuicao)
        {
            return $this->controleContribuicaoService->confirmaContribuicao($co_seq_controle_contribuicao);
        }

        public function formReprovaContribuicao($co_seq_controle_contribuicao)
        {
            $dados = $co_seq_controle_contribuicao;
            return view('tesouraria.modalReprovaContribuicao')->with('dados', $dados);
        }

        public function saveReprovaContribuicao($co_seq_controle_contribuicao)
        {
            return $this->controleContribuicaoService->reprovaContribuicao($co_seq_controle_contribuicao);
        }


    }