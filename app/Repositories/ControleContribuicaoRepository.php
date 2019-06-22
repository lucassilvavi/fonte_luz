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

    function getContribuicao($classificacaoPagamento, $periodeDe, $periodeAte, $membro)
    {
        $query = "SELECT * from tb_controle_contribuicao tcc
                    INNER JOIN tb_usuario tu ON tcc.id = tu.id
                    WHERE 1=1 ";
        $query.= $this->validarClassificacao($classificacaoPagamento);
        $query .= is_null($periodeDe)? '': " AND dt_contribuicao >= $periodeDe";
        $query .= is_null($periodeAte)? '': " AND dt_contribuicao <= $periodeAte";
        $query .= is_null($membro)? '': " AND tu.ID = $membro";

        return DB::select($query);
    }

    public function validarClassificacao(string $classificacaoPagamento): string
    {
        $query = "";
        switch ($classificacaoPagamento) {
            case ("Pendente de Validação"):
                $query = "AND DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL";
                break;
            case ("Pagamentos Validados"):
                $query = "AND DT_CONFIRMACAO_FINANCEIRO IS NOT NULL";
                break;
            case ("Pendente com Observação"):
                $query = "AND DT_CONFIRMACAO_FINANCEIRO IS NULL AND DT_REPROVACAO_FINANCEIRO IS NULL AND DS_OBSERVACAO_FINANCEIRO IS NOT NULL";
                break;
            case ("Reprovado"):
                $query = "AND DT_REPROVACAO_FINANCEIRO IS NOT NULL";
                break;

        }
        return $query;
    }


}