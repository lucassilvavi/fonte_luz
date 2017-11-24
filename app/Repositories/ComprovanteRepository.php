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
use Illuminate\Support\Facades\DB;

class ComprovanteRepository extends Repository
{

    public function __construct(Comprovante $comprovante)
    {
        $this->model = $comprovante;

    }
    function apagarComprovante($co_comprovante){
        DB::select("DELETE FROM `tb_comprovante` WHERE co_seq_comprovante = $co_comprovante");
    }
    function getComprovantes($co_seq_controle_contribuicao){
        return DB::select("
        SELECT TC.co_seq_comprovante,TC.ds_endereco_comprovante,TC.co_seq_comprovante 
        FROM tb_controle_contribuicao tcc
        INNER JOIN rl_compr_controle RCC ON TCC.co_seq_controle_contribuicao = RCC.co_seq_controle_contribuicao
        INNER JOIN tb_comprovante TC ON RCC.co_seq_comprovante = TC.co_seq_comprovante
        WHERE tc.dt_exclusao_anexo is null
        AND tcc.co_seq_controle_contribuicao = $co_seq_controle_contribuicao");
    }

}