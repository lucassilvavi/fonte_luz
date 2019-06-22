<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 07/08/18
 * Time: 16:54
 */

namespace App\Services;

use App\Repositories\TurmaRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Data;

class TurmaService
{
    private $turmaRepository;
    private $data;

    public function __construct(TurmaRepository $turmaRepository,
                                Data $data)
    {
        $this->turmaRepository = $turmaRepository;
        $this->data = $data;
    }

    public function save($dadosForm)
    {
        DB::beginTransaction();

        try {

            $dados['dt_abertura_turma'] = date("Y-m-d");
            $dados['dt_fechamento_turma'] = $this->data->dataSqlBR($dadosForm['fechamento']);
            $dados['nu_vagas'] = $dadosForm['vagas'];
            $dados['st_situacao_turma'] = "S";
            $dados['TB_CURSO_co_seq_curso'] = $dadosForm['curso'];

            $this->turmaRepository->create($dados);


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

    public function desativar($co_seq_turma)
    {
        DB::beginTransaction();

        try {

            $dados['dt_encerramento_turma'] = date("Y-m-d");
            $dados['st_situacao_turma'] = "N";

            $this->turmaRepository->update($dados,$co_seq_turma,"co_seq_turma");


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