<?php
/**
 * Created by PhpStorm.
 * User: lucas.vieira
 * Date: 09/10/2017
 * Time: 19:50
 */

namespace App\Repositories;

use App\Models\GrupoPermissao;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Auth;

class GrupoPermissaoRepository extends Repository
{


    public function __construct(GrupoPermissao $grupoPermissao,
                                Auth $auth)
    {
        $this->model = $grupoPermissao;
        $this->auth = $auth;
    }
    function grupoAtivos(){
        return $this->model
            ->where('st_ativo','S')->get();
    }
}