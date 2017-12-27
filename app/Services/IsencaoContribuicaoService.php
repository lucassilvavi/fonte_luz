<?php
    /**
     * Created by PhpStorm.
     * User: lucas.vieira
     * Date: 27/12/2017
     * Time: 11:00
     */

    namespace App\Services;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use App\Repositories\IsencaoContribuicaoRepository;
    use App\Http\Controllers\Data;

    class IsencaoContribuicaoService
    {
        private $isencaoContribuicaoRepository;
        private $data;

        public function __construct(IsencaoContribuicaoRepository $isencaoContribuicaoRepository,
                                    Data $data)
        {
            $this->isencaoContribuicaoRepository = $isencaoContribuicaoRepository;
            $this->data = $data;
        }

        function create($dadosForm)
        {
            DB::beginTransaction();

            try {
                $dados['dt_inicio_vigencia'] = $this->data->montaData($dadosForm['deMes'], $dadosForm['deAno']);
                if (!empty($dadosForm['ateMes']) && !empty($dadosForm['ateAno'])) {
                    $dados['dt_fim_vigencia'] = $this->data->montaData($dadosForm['ateMes'], $dadosForm['ateAno']);
                }
                $dados['ds_observacao'] = $dadosForm['motivo'];
                $dados['id_usuario'] = $dadosForm['membro'];
                $this->isencaoContribuicaoRepository->create($dados);

                DB::commit();
                return '{"operacao":true}';
            } catch (\Illuminate\Database\QueryException $e) {

                $exception = $e->getMessage() . $e->getTraceAsString();
                Log::error($exception);

                DB::rollback();
                //Retorna as informacoes do erro.

                return '{"operacao":false}';
            }
        }

        function update($dadosForm, $co_seq_isencao_contribuicao)
        {
            DB::beginTransaction();

            try {
                $dados['dt_inicio_vigencia'] = $this->data->montaData($dadosForm['deMes'], $dadosForm['deAno']);
                if (!empty($dadosForm['ateMes']) && !empty($dadosForm['ateAno'])) {
                    $dados['dt_fim_vigencia'] = $this->data->montaData($dadosForm['ateMes'], $dadosForm['ateAno']);
                }
                $dados['ds_observacao'] = $dadosForm['motivo'];
                $dados['id_usuario'] = $dadosForm['membro'];
                $this->isencaoContribuicaoRepository->update($dados, $co_seq_isencao_contribuicao, 'co_seq_isencao_contribuicao');

                DB::commit();
                return '{"operacao":true}';
            } catch (\Illuminate\Database\QueryException $e) {

                $exception = $e->getMessage() . $e->getTraceAsString();
                Log::error($exception);

                DB::rollback();
                //Retorna as informacoes do erro.

                return '{"operacao":false}';
            }
        }
    }