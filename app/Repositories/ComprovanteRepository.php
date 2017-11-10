<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 09/11/2017
 * Time: 22:14
 */

namespace App\Repositories;
use App\Repositories\Repository;
use App\Models\Comprovante;

class ComprovanteRepository extends Repository
{

    public function __construct(Comprovante $comprovante)
    {
        $this->model = $comprovante;

    }

}