<?php
    /**
     * Created by PhpStorm.
     * User: lucas.vieira
     * Date: 08/01/2018
     * Time: 15:46
     */

    namespace App\Http\Controllers\TipoContribuicao;

    use App\Repositories\UsuarioRepository;
    use App\Http\Controllers\Data;
    use App\Repositories\ControleContribuicaoRepository;
    use Gate;


    class ContribuicaoController
    {
        private $data;
        private $usuarioRepository;
        private $controleContribuicaoRepository;

        public function __construct(UsuarioRepository $usuarioRepository,
                                    Data $data,
                                    ControleContribuicaoRepository $controleContribuicaoRepository)
        {
            $this->usuarioRepository = $usuarioRepository;
            $this->data = $data;
            $this->controleContribuicaoRepository = $controleContribuicaoRepository;
        }

        public function deposito()
        {
            if (Gate::denies('tesouraria')) {
                return redirect()->back();
            }
            $dados['usuarios'] = $this->usuarioRepository->all();
            return view('tipoContribuicao.deposito')->with('dados', $dados);
        }
        public function gaveta()
        {
            if (Gate::denies('tesouraria')) {
                return redirect()->back();
            }
            $dados['usuarios'] = $this->usuarioRepository->all();
            return view('tipoContribuicao.gaveta')->with('dados', $dados);
        }

        public function getdeposito($periodeDe, $periodeAte, $membro)
        {
            $periodeDe = self::trocaNull($periodeDe);
            $periodeAte = self::trocaNull($periodeAte);
            $membro = self::trocaNull($membro);

            if (!empty($periodeDe) && !empty($periodeAte) && !empty($membro)) {
                $de = $this->data->dataSql($periodeDe);
                $ate = $this->data->dataSql($periodeAte);
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao >= $de AND dt_contribuicao <= $ate AND tu.ID = " . $membro . " AND TP_CONTRIBUICAO = 1");

            } elseif (!empty($periodeDe) && !empty($periodeAte)) {
                $de = $this->data->dataSql($periodeDe);
                $ate = $this->data->dataSql($periodeAte);
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao >= $de AND dt_contribuicao <= $ate AND TP_CONTRIBUICAO = 1");

            } elseif (!empty($periodeDe) && !empty($membro)) {
                $de = $this->data->dataSql($periodeDe);
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao >= $de AND tu.ID = " . $membro . " AND TP_CONTRIBUICAO = 1");

            } elseif (!empty($periodeAte) && !empty($membro)) {
                $ate = $this->data->dataSql($periodeAte);
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao <= $ate AND tu.ID = " . $membro . " AND TP_CONTRIBUICAO = 1");

            } elseif (!empty($periodeDe)) {
                $de = $this->data->dataSql($periodeDe);
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao >= $de AND TP_CONTRIBUICAO = 1");

            } elseif (!empty($periodeAte)) {
                $ate = $this->data->dataSql($periodeAte);
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao <= $ate  AND TP_CONTRIBUICAO = 1");

            } elseif ($membro) {
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE tu.ID = " . $membro . " AND TP_CONTRIBUICAO = 1");

            } else {
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE TP_CONTRIBUICAO = 1");
            }
            return view('tipoContribuicao.tableDeposito')->with('dados', $dados);
        }
        public function getgaveta($periodeDe, $periodeAte, $membro)
        {
            $periodeDe = self::trocaNull($periodeDe);
            $periodeAte = self::trocaNull($periodeAte);
            $membro = self::trocaNull($membro);

            if (!empty($periodeDe) && !empty($periodeAte) && !empty($membro)) {
                $de = $this->data->dataSql($periodeDe);
                $ate = $this->data->dataSql($periodeAte);
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao >= $de AND dt_contribuicao <= $ate AND tu.ID = " . $membro . " AND TP_CONTRIBUICAO = 2");

            } elseif (!empty($periodeDe) && !empty($periodeAte)) {
                $de = $this->data->dataSql($periodeDe);
                $ate = $this->data->dataSql($periodeAte);
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao >= $de AND dt_contribuicao <= $ate AND TP_CONTRIBUICAO = 2");

            } elseif (!empty($periodeDe) && !empty($membro)) {
                $de = $this->data->dataSql($periodeDe);
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao >= $de AND tu.ID = " . $membro . " AND TP_CONTRIBUICAO = 2");

            } elseif (!empty($periodeAte) && !empty($membro)) {
                $ate = $this->data->dataSql($periodeAte);
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao <= $ate AND tu.ID = " . $membro . " AND TP_CONTRIBUICAO = 2");

            } elseif (!empty($periodeDe)) {
                $de = $this->data->dataSql($periodeDe);
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao >= $de AND TP_CONTRIBUICAO = 2");

            } elseif (!empty($periodeAte)) {
                $ate = $this->data->dataSql($periodeAte);
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE dt_contribuicao <= $ate  AND TP_CONTRIBUICAO = 2");

            } elseif ($membro) {
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE tu.ID = " . $membro . " AND TP_CONTRIBUICAO = 2");

            } else {
                $dados['resultado'] = $this->controleContribuicaoRepository->getContribuicao("WHERE TP_CONTRIBUICAO = 2");
            }
            return view('tipoContribuicao.tableGaveta')->with('dados', $dados);
        }


        public function trocaNull($parament)
        {
            if ($parament == 'null') {
                return $parament = null;
            }
            return $parament;
        }
    }