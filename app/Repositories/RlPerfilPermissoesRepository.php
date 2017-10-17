<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 12/10/2017
 * Time: 13:04
 */

namespace App\Repositories;

use App\Repositories\Repository;
use App\Models\RlPerfilPermissoes;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class RlPerfilPermissoesRepository extends Repository
{
    public $model;
    public function __construct(RlPerfilPermissoes $rlPerfilPermissoes)
    {
        $this->model = $rlPerfilPermissoes;
    }

    function getPerfisVinculadosPermissao($co_permissao)
    {
        return $this->model
            ->join('tb_perfil','tb_perfil.co_seq_perfil','=','rl_perfil_permissoes.co_seq_perfil')
            ->where('co_seq_permissoes', $co_permissao)->get();
    }
    function getPerfilVinculadoAPermissao($co_permissao , $co_perfil){
        return $this->model
            ->where('co_seq_permissoes', $co_permissao)
            ->where('co_seq_perfil',$co_perfil)
            ->where('dt_exclusao',null)
            ->get();
    }
    function getPermissoesParaDesativar($permissoesAtivas,$co_perfil){
        return $this->model
            ->whereNotIn('co_seq_permissoes',$permissoesAtivas)
            ->where('co_seq_perfil',$co_perfil)
            ->where('dt_exclusao',null)
            ->get();
    }
    function getPermissoesAtivasParaPermissao($co_perfil){
        return $this->model
            ->where('co_seq_perfil',$co_perfil)
            ->where('dt_exclusao',null)
            ->get();
    }
    public function getId()
    {
        $valorid = DB::select("SELECT max(co_seq_perfil_permissoes + 1) as id from rl_perfil_permissoes")[0]->id;
        if ($valorid == null){
            return 1;
        } else {
            return DB::select("SELECT max(co_seq_perfil_permissoes + 1) as id from rl_perfil_permissoes")[0]->id;
        }
    }
}