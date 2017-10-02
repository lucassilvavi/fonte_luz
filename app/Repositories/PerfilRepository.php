<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/09/2017
 * Time: 15:20
 */

namespace App\Repositories;
use App\Repositories\Repository;
use App\Models\Perfil;

class PerfilRepository extends Repository
{
    public function __construct(Perfil $perfil)
    {
        $this->model = $perfil;
    }
}