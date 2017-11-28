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

        function apagarComprovante($co_comprovante)
        {
            DB::select("DELETE FROM `tb_comprovante` WHERE co_seq_comprovante = $co_comprovante");
        }

        function getComprovantes($co_seq_controle_contribuicao)
        {
            return DB::select("
                       SELECT tc.co_seq_comprovante,tc.ds_endereco_comprovante 
                        from tb_controle_contribuicao tcc
                        inner JOIN rl_compr_controle rcc on tcc.co_seq_controle_contribuicao = rcc.co_seq_controle_contribuicao
                        inner join tb_comprovante tc on rcc.co_seq_comprovante = tc.co_seq_comprovante
                        WHERE tc.dt_exclusao_anexo is null
                        and tcc.co_seq_controle_contribuicao = $co_seq_controle_contribuicao");
        }

        function getComprovanteForDesable($co_seq_comprovante)
        {
            return DB::select("
        SELECT tc.ds_endereco_comprovante FROM tb_controle_contribuicao tcc
        inner JOIN rl_compr_controle rcc on tcc.co_seq_controle_contribuicao = rcc.co_seq_controle_contribuicao
        inner join tb_comprovante tc on rcc.co_seq_comprovante =  tc.co_seq_comprovante
        WHERE tc.co_seq_comprovante = $co_seq_comprovante
        AND tcc.dt_confirmacao_financeiro is null
        ");
        }

    }