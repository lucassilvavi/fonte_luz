<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 11/09/2017
 * Time: 17:13
 */

namespace App\Repositories;

use App\Models\Foto;

class FotoRepository extends Repository
{
    protected $model;

    public function __construct(Foto $foto)
    {
        $this->model = $foto;
    }

    public function getAtiva()
    {
        return $this->model->where('st_ativo', 'S')->get();
    }
}