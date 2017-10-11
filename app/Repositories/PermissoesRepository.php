<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/09/2017
 * Time: 17:36
 */

namespace App\Repositories;

use App\Models\Permissoes;
use App\Repositories\Repository;

class PermissoesRepository extends Repository
{
    public function __construct(Permissoes $permissoes)
    {
        $this->model = $permissoes;
    }

    function getPermissoesAtivasProGrupo($co_grupo_permissoes)
    {
        return $this->model->where('co_grupo_permissoes', $co_grupo_permissoes)->get();
    }
}