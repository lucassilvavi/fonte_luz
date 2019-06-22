<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 31/07/18
 * Time: 16:58
 */

namespace App\Services;

use App\Repositories\FinanceiroRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Data;

class FinanceiroService
{
    private $financeiroRepository;
    private $data;

    public function __construct(FinanceiroRepository $financeiroRepository,
                                Data $data)
    {
        $this->financeiroRepository = $financeiroRepository;
        $this->data = $data;
    }

    public function save($dadosForm)
    {
        DB::beginTransaction();

        try {


            $dados['co_tipo_lancamento'] = $dadosForm['tpLancamento'];
            $dados['tipo_lancamento'] = $dadosForm['ntLancamento'];
            $dados['dt_liquidacao'] = $this->data->dataSqlBR($dadosForm['dtLiquidacao']);
            $dados['mes_referencia'] = $dadosForm['mes'];
            $dados['ano_referencia'] = $dadosForm['ano'];
            $dados['valor'] = self::trataMoeda($dadosForm['valor']);
            $dados['descricao'] = $dadosForm['descricao'];
            $dados['st_ativo'] = "S";

            $this->financeiroRepository->create($dados);

            DB::commit();
            return '{"operacao":true,"msg":"create"}';
        } catch (\Illuminate\Database\QueryException $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);

            DB::rollback();
            //Retorna as informacoes do erro.

            return '{"operacao":false}';
        }
    }

    public function trataMoeda($valor)
    {
        $dinheiro = str_replace('.', '', $valor); // remove o ponto
        return str_replace(',', '.', $dinheiro); // troca a vírgula por ponto
    }
    public function update($dadosForm)
    {
        DB::beginTransaction();

        try {


            $dados['co_tipo_lancamento'] = $dadosForm['tpLancamento'];
            $dados['tipo_lancamento'] = $dadosForm['ntLancamento'];
            $dados['dt_liquidacao'] = $this->data->dataSqlBR($dadosForm['dtLiquidacao']);
            $dados['mes_referencia'] = $dadosForm['mes'];
            $dados['ano_referencia'] = $dadosForm['ano'];
            $dados['valor'] = self::trataMoeda($dadosForm['valor']);
            $dados['descricao'] = $dadosForm['descricao'];

            $this->financeiroRepository->update($dados,$dadosForm['co_seq_financeiro'],"co_seq_financeiro");

            DB::commit();
            return '{"operacao":true,"msg":"edit"}';
        } catch (\Illuminate\Database\QueryException $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);

            DB::rollback();
            //Retorna as informacoes do erro.

            return '{"operacao":false}';
        }
    }
    public function estorno($co_seq_financeiro)
    {
        DB::beginTransaction();

        try {

            $dados['st_ativo'] = "N";

            $this->financeiroRepository->update($dados,$co_seq_financeiro,"co_seq_financeiro");

            DB::commit();
            return '{"operacao":true}';
        } catch (\Illuminate\Database\QueryException $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);

            DB::rollback();
            //Retorna as informacoes do erro.

            return '{"operacao":false}';
        }
    }

}