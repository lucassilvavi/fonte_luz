<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 09/11/2017
 * Time: 22:15
 */

namespace App\Repositories;

use App\Repositories\Repository;
use App\Models\ControleContribuicao;
use Illuminate\Support\Facades\DB;

class ControleContribuicaoRepository extends Repository
{
    private $controleContribuicao;

    public function __construct(ControleContribuicao $controleContribuicao)
    {
        $this->model = $controleContribuicao;
    }

    function getContribuicaoAtiva($id)
    {
        return $this->model->where('id', $id)
            ->where('dt_exclusao_registro', "=", null)->get();
    }

    function getContribuicaoPorPeriodo($de, $ate)
    {
        return DB::select("
        SELECT * from tb_controle_contribuicao
        WHERE dt_contribuicao BETWEEN $de AND $ate
        ");
    }

}