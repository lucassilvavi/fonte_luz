<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 08/10/2017
 * Time: 12:26
 */

namespace App\Repositories;
use App\Models\Telefone;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Auth;

class TelefoneRepository extends Repository
{

    public function __construct(Telefone $telefone,
                                Auth $auth)
    {
        $this->model = $telefone;
        $this->auth = $auth;
    }
    function getTelefonesAtivos($id){
        return $this->model
            ->where('id',$id)
            ->where('st_ativo','S')->get();
    }


}