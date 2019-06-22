<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/07/18
 * Time: 12:31
 */

namespace App\Repositories;

use App\Models\TipoLancamento;

class TipoLancamentoRepository extends Repository
{
    protected $model;

    public function __construct(TipoLancamento $tipoLancamento)
    {
        $this->model = $tipoLancamento;
    }
    public function getAtivos(){
        return $this->model
            ->where('st_ativo',"S")
            ->get();
    }

}