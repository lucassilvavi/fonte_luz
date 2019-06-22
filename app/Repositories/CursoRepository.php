<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 06/08/18
 * Time: 18:31
 */

namespace App\Repositories;


use App\Models\Curso;
use App\Repositories\Repository;

class CursoRepository extends Repository
{
    protected $model;

    public function __construct(Curso $curso)
    {
        $this->model = $curso;
    }

    public function getAtivo()
    {
        return $this->model
            ->where('st_ativo', "S")
            ->get();
    }
}