<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/07/18
 * Time: 16:22
 */

namespace App\Services;

use App\Repositories\TipoLancamentoRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TipoLancamentoService
{
    private $tipoLancamentoRepository;

    public function __construct(TipoLancamentoRepository $tipoLancamentoRepository)
    {
        $this->tipoLancamentoRepository = $tipoLancamentoRepository;
    }

    public function save($dadosForm)
    {
        DB::beginTransaction();

        try {

            $dados['no_tipo_lancamento'] = $dadosForm['no_tipo_lancamento'];
            $dados['ds_tipo_lancamento'] = $dadosForm['ds_tipo_lancamento'];
            $dados['st_ativo'] = $dadosForm['st_ativo'];

            $this->tipoLancamentoRepository->create($dados);


            DB::commit();
            return '{"operacao":true,"msg":"create"}';
        } catch (\Illuminate\Database\QueryException $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);

            DB::rollback();
            //Retorna as informacoes do erro.

            return '{"operacao":false}';
        }
    }
    public function edit($dadosForm)
    {
        DB::beginTransaction();

        try {

            $dados['no_tipo_lancamento'] = $dadosForm['no_tipo_lancamento'];
            $dados['ds_tipo_lancamento'] = $dadosForm['ds_tipo_lancamento'];
            $dados['st_ativo'] = $dadosForm['st_ativo'];

            $this->tipoLancamentoRepository->update($dados,$dadosForm['co_seq_tipo_lancamento'],'co_seq_tipo_lancamento');

            DB::commit();
            return '{"operacao":true,"msg":"edit"}';
        } catch (\Illuminate\Database\QueryException $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);

            DB::rollback();
            //Retorna as informacoes do erro.

            return '{"operacao":false}';
        }
    }
}