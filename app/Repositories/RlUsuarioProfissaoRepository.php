<?php
/**
 * Created by PhpStorm.
 * User: lucas.vieira
 * Date: 02/10/2017
 * Time: 19:13
 */

namespace App\Repositories;

use App\Repositories\Repository;
use App\Models\RlUsuarioProfissao;
use Illuminate\Support\Facades\DB;

class RlUsuarioProfissaoRepository extends Repository
{


    public function __construct(RlUsuarioProfissao $rlUsuarioProfissao)
    {
        $this->model = $rlUsuarioProfissao;
    }

    public function getTrabalhoAtivo($id)
    {
        return $this->model->where('st_profissao_principal', 'S')->where('dt_desativacao', null)
            ->where('id',$id)->get();
    }
    public function getHabilidadesAtivo($id)
    {
        return $this->model
            ->join('tb_profissao','tb_profissao.co_seq_profissao','=','rl_usuario_profissao.co_seq_profissao')
            ->where('rl_usuario_profissao.st_profissao_principal', 'N')
            ->where('rl_usuario_profissao.dt_desativacao', null)
            ->where('rl_usuario_profissao.id',$id)->get();
    }

    public function getId()
    {
        $valorid = DB::select("SELECT max(CO_SEQ_USUARIO_PROFISSAO + 1) as id from rl_usuario_profissao")[0]->id;
        if ($valorid == null){
            return 1;
        } else {
            return DB::select("SELECT max(CO_SEQ_USUARIO_PROFISSAO + 1) as id from rl_usuario_profissao")[0]->id;
        }
    }

}