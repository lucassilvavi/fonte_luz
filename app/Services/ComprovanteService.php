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
use App\Repositories\ControleContribuicaoRepository;

class ComprovanteService
{
    private $comprovanteRepository;
    private $controleContribuicaoRepository;

    function __construct(ComprovanteRepository $comprovanteRepository,
                         ControleContribuicaoRepository $controleContribuicaoRepository)
    {
        $this->comprovanteRepository = $comprovanteRepository;
        $this->controleContribuicaoRepository = $controleContribuicaoRepository;
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

    public function adiciona($comprovantes, $co_seq_controle_contribuicao)
    {
        DB::beginTransaction();

        try {
            $controle = $this->controleContribuicaoRepository->findBy('co_seq_controle_contribuicao', $co_seq_controle_contribuicao);
            foreach ($comprovantes as $comprovante) {
                $controle->comprovante()->attach($comprovante, ['st_ativo' => 'S']);
            }

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