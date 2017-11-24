<?php
    /**
     * Created by PhpStorm.
     * User: lucas
     * Date: 09/11/2017
     * Time: 22:18
     */

    namespace App\Services;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use App\Repositories\ComprovanteRepository;

    class ComprovanteService
    {
        private $comprovanteRepository;

        function __construct(ComprovanteRepository $comprovanteRepository)
        {
            $this->comprovanteRepository = $comprovanteRepository;
        }

        public function novo($endereco)
        {
            DB::beginTransaction();

            try {
                $dados['ds_endereco_comprovante'] = $endereco;
                $dados['dt_anexo'] = date("Y-m-d");
                $co_comprovante = $this->comprovanteRepository->create($dados);

                DB::commit();
                return $co_comprovante;
            } catch (\Illuminate\Database\QueryException $e) {

                $exception = $e->getMessage() . $e->getTraceAsString();
                Log::error($exception);

                DB::rollback();
                //Retorna as informacoes do erro.

                return '{"operacao":false}';
            }
        }

        public function desativar($co_seq_comprovante)
        {
            DB::beginTransaction();

            try {
                $dados['dt_exclusao_anexo'] = date("Y-m-d");
                $this->comprovanteRepository->update($dados, $co_seq_comprovante, "co_seq_comprovante");

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