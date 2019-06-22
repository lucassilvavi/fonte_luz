<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 07/08/18
 * Time: 18:54
 */

namespace App\Repositories;

use App\Models\TurmaUsuario;
use Illuminate\Support\Facades\DB;

class TurmaUsuarioRepository extends Repository
{

    protected $model;

    public function __construct(TurmaUsuario $turmaUsuario)
    {
        $this->model = $turmaUsuario;
    }

    public function getUsuarioVinculados($co_seq_turma)
    {
        return $this->model
            ->join('tb_usuario', 'tb_turma_usuario.TB_USUARIO_id', 'tb_usuario.id')
            ->where('tb_turma_usuario.ds_desvinculacao_turma', null)
            ->where('TB_TURMA_co_seq_turma', $co_seq_turma)
            ->get();
    }

    public function getCursosByUser($id)
    {
        return $this->model
            ->join('tb_turma', 'tb_turma_usuario.TB_TURMA_co_seq_turma', 'tb_turma.co_seq_turma')
            ->join('tb_curso', 'tb_turma.TB_CURSO_co_seq_curso', 'tb_curso.co_seq_curso')
            ->where('tb_turma_usuario.TB_USUARIO_id', $id)
            ->where('tb_turma_usuario.dt_desvinculacao_turma', null)
            ->select('tb_curso.*', 'tb_turma_usuario.*')
            ->get();
    }

    public function getCursosAbertor($id)
    {
        return DB::select("
        SELECT tu.*,
       tc.*
          FROM tb_curso tc
                INNER JOIN tb_turma tu
                        on tc.co_seq_curso = tu.TB_CURSO_co_seq_curso
        WHERE co_seq_curso NOT IN (
        
        select  t2.co_seq_curso
        from tb_turma_usuario tu
               inner join tb_usuario u
                      on tu.TB_USUARIO_id = u.id
               inner join tb_turma t
                      on t.co_seq_turma = tu.TB_TURMA_co_seq_turma
               inner join tb_curso t2
                      on t.TB_CURSO_co_seq_curso = t2.co_seq_curso
                                           and tu.st_ativo = 'S'
                                           and u.id = $id)");

    }

}