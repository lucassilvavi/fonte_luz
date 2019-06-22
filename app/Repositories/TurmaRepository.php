<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 07/08/18
 * Time: 16:54
 */

namespace App\Repositories;

use App\Models\Turma;

class TurmaRepository extends Repository
{
    protected $model;

    public function __construct(Turma $turma)
    {
        $this->model = $turma;
    }

    public function getAtivo($sitacao, $curso)
    {
        return $this->model
            ->where('TB_CURSO_co_seq_curso', $curso)
            ->where('st_situacao_turma', $sitacao)
            ->get();
    }
}