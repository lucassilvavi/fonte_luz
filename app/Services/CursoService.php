<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 06/08/18
 * Time: 18:33
 */

namespace App\Services;

use App\Repositories\CursoRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CursoService
{
    private $cursoRepository;

    public function __construct(CursoRepository $cursoRepository)
    {
        $this->cursoRepository = $cursoRepository;
    }

    public function save($dadoForm)
    {
        DB::beginTransaction();

        try {
            $dados['dt_cadastro_curso'] = date("Y-m-d");
            $dados['no_curso'] = $dadoForm['notipolancamento'];
            $dados['ds_ementa_curso'] = $dadoForm['dstipolancamento'];
            $dados['st_ativo'] = "S";
            $this->cursoRepository->create($dados);

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

    public function desativar($co_seq_curso)
    {
        DB::beginTransaction();

        try {
            $dados['dt_exclusao_curso'] = date("Y-m-d");
            $dados['st_ativo'] = "N";

            $this->cursoRepository->update($dados, $co_seq_curso, "co_seq_curso");

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

    public function ativar($co_seq_curso)
    {
        DB::beginTransaction();

        try {
            $dados['dt_exclusao_curso'] = null;
            $dados['st_ativo'] = "S";

            $this->cursoRepository->update($dados, $co_seq_curso, "co_seq_curso");

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

    public function update($dadoForm)
    {
        DB::beginTransaction();

        try {
            $dados['no_curso'] = $dadoForm['notipolancamento'];
            $dados['ds_ementa_curso'] = $dadoForm['dstipolancamento'];

            $this->cursoRepository->update($dados, $dadoForm['co_seq_curso'], "co_seq_curso");

            DB::commit();
            return '{"operacao":true,"msg":"update"}';
        } catch (\Illuminate\Database\QueryException $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);

            DB::rollback();
            //Retorna as informacoes do erro.

            return '{"operacao":false}';
        }
    }
}