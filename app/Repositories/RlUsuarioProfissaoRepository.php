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

    public function getTrabalhoAtivo()
    {
        return $this->model->where('st_profissao_principal', 'S')->where('dt_desativacao', null)->get();
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