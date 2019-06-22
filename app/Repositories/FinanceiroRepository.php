<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 31/07/18
 * Time: 16:56
 */

namespace App\Repositories;

use App\Models\Financeiro;

class FinanceiroRepository extends Repository
{
    protected $model;

    public function __construct(Financeiro $financeiro)
    {
        $this->model = $financeiro;
    }

    public function getDados($periodeDe, $periodeAte, $nt_lancamento, $tipo_lancamento)
    {

        $query = $this->model
            ->whereBetween('dt_liquidacao', [$periodeDe, $periodeAte])
            ->where('st_ativo', "S");
        if ($nt_lancamento != "null") {
            $query = $query->where('tipo_lancamento', $nt_lancamento);
        }
        if ($tipo_lancamento != "null") {
            $query = $query->where('co_tipo_lancamento', $tipo_lancamento);
        }

        return $query->get();
    }

}