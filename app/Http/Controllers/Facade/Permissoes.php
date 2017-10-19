<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 18/10/2017
 * Time: 20:26
 */

namespace App\Http\Controllers\Facade;

use Illuminate\Support\Facades\DB;
use App\Repositories\RlPerfilPermissoesRepository;
use Illuminate\Support\Facades\Auth;

class Permissoes
{
    function getPermissoesAtivas($co_seq_perfil)
    {
        return DB::select("SELECT * FROM rl_perfil_permissoes WHERE co_seq_perfil = $co_seq_perfil AND dt_exclusao is null");
    }
}