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
        return DB::select("
        SELECT tcc.*,tc.* from 
          tb_controle_contribuicao tcc
          INNER JOIN rl_compr_controle rcc on tcc.co_seq_controle_contribuicao = rcc.co_seq_controle_contribuicao
          INNER JOIN tb_comprovante tc on rcc.co_seq_comprovante = tc.co_seq_comprovante
            WHERE tcc.id = $id
            and tc.dt_exclusao_anexo is null
            and tcc.dt_exclusao_registro is null
        ");
    }
}