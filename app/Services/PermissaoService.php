<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/09/2017
 * Time: 19:23
 */

namespace App\Services;
use App\Repositories\PermissoesRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PermissaoService
{
    private $permissoesRepository;

    public function __construct(PermissoesRepository $permissoesRepository)
    {
        $this->permissoesRepository = $permissoesRepository;
    }
    public function nova($dadosForm)
    {
        DB::beginTransaction();

        try {

            $dados['no_permissao'] = $dadosForm['nome'];
            $dados['ds_permissao'] = $dadosForm['descricao'];
            $dados['co_grupo_permissoes'] = $dadosForm['grupo'];
            $this->permissoesRepository->create($dados);
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