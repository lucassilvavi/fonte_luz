<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 07/08/18
 * Time: 19:53
 */

namespace App\Services;

use App\Repositories\TurmaUsuarioRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Null_;

class TurmaUsuarioServices
{
    private $turmaUsuarioRepository;

    public function __construct(TurmaUsuarioRepository $turmaUsuarioRepository)
    {
        $this->turmaUsuarioRepository = $turmaUsuarioRepository;
    }

    public function saveAdministrativo($dadosForm)
    {
        DB::beginTransaction();

        try {
            foreach ($dadosForm['usuarios'] as $usuario) {


                $dados['dt_vinculacao_turma'] = date("Y-m-d");
                $dados['st_ativo'] = "S";
                $dados['id_usuario_vinculador'] = $usuario;
                $dados['TB_TURMA_co_seq_turma'] = $dadosForm['co_seq_turma'];
                $dados['TB_USUARIO_id'] = $usuario;

                $this->turmaUsuarioRepository->create($dados);
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

    public function desmatricularAluno($co_seq_turma_usuario, $id, $motivo = null)
    {
        DB::beginTransaction();

        try {
            if ($motivo == null) {
                $motivo = " Desmatriculado pelo administrativo id=" . \Auth::user()->id . " nome=" . \Auth::user()->no_nome;
            }

            $dados['dt_desvinculacao_turma'] = date("Y-m-d");
            $dados['st_ativo'] = "N";
            $dados['id_usuario_desvinculacao'] = $id;
            $dados['ds_desvinculacao_turma'] = $motivo;


            $this->turmaUsuarioRepository->update($dados, $co_seq_turma_usuario, "co_seq_turma_usuario");


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
    public function saveHome($co_seq_turma,$id)
    {
        DB::beginTransaction();

        try {

                $dados['dt_vinculacao_turma'] = date("Y-m-d");
                $dados['st_ativo'] = "S";
                $dados['id_usuario_vinculador'] = $id;
                $dados['TB_TURMA_co_seq_turma'] = $co_seq_turma;
                $dados['TB_USUARIO_id'] = $id;

                $this->turmaUsuarioRepository->create($dados);

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