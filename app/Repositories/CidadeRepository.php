<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 23/09/2017
 * Time: 20:55
 */

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;
use App\Models\Cidade;

class CidadeRepository extends Repository
{

    public function __construct(Cidade $cidade,
                                Auth $auth)
    {
        $this->model = $cidade;
        $this->auth = $auth;
    }
    public function getCidadeWithUF($sg_uf){
        return $this->model->where('sg_uf',$sg_uf)->get();
    }

}