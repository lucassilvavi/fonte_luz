<?php
/**
 * Created by PhpStorm.
 * User: lucas.vieira
 * Date: 09/10/2017
 * Time: 19:51
 */

namespace App\Services;

use App\Repositories\GrupoPermissaoRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GrupoPermissaoService
{

    private $grupoPermissaoRepository;

    public function __construct(GrupoPermissaoRepository $grupoPermissaoRepository)
    {
        $this->grupoPermissaoRepository = $grupoPermissaoRepository;
    }

    function create($dadosForm)
    {
        DB::beginTransaction();

        try {
            $dados['no_grupo'] = $dadosForm['nome'];
            $dados['ds_grupo'] = $dadosForm['descricao_grupo'];
            $dados['st_ativo'] = 'S';
            $this->grupoPermissaoRepository->create($dados);
            DB::commit();
            return '{"operacao":true}';
        } catch (\Illuminate\Database\QueryException $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);

            DB::rollback();
            //Retorna as informacoes do erro.

            return '{"operacao":false}';
        } catch (\Yajra\Pdo\Oci8\Exceptions\Oci8Exception $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);

            DB::rollback();

            //Retorna as informacoes do erro.
            return '{"operacao":false}';
        }
    }
    function desable($co_seq_grupo_permissoes)
    {
        DB::beginTransaction();

        try {
            $dados['st_ativo'] = 'N';
            $this->grupoPermissaoRepository->update($dados, $co_seq_grupo_permissoes, 'co_seq_grupo_permissoes');
            DB::commit();
            return '{"operacao":true}';
        } catch (\Illuminate\Database\QueryException $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);

            DB::rollback();
            //Retorna as informacoes do erro.

            return '{"operacao":false}';
        } catch (\Yajra\Pdo\Oci8\Exceptions\Oci8Exception $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);

            DB::rollback();

            //Retorna as informacoes do erro.
            return '{"operacao":false}';
        }
    }
}