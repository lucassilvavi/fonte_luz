<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 23/09/2017
 * Time: 21:04
 */

namespace App\Repositories;
use App\Repositories\Repository;
use App\Models\UnidadeFederativa;

class UnidadeFederativaRepository extends Repository
{

    public function __construct(UnidadeFederativa $unidadeFederativa)
    {
        $this->model = $unidadeFederativa;
    }
    public function getCoUnidade($no_uf){

         return $this->model->where('sg_uf',$no_uf)->get()[0]['co_seq_uf'];
    }
}