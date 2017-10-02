<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/09/2017
 * Time: 16:30
 */

namespace App\Services;

use App\Repositories\PerfilRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PerfilService
{
    private $perfilRepository;

    public function __construct(PerfilRepository $perfilRepository)
    {
        $this->perfilRepository = $perfilRepository;
    }

    public function nova($dadosForm)
    {
        DB::beginTransaction();

        try {

            $dados['no_perfil'] = $dadosForm['nome'];
            $dados['ds_perfil'] = $dadosForm['descricao'];
            $dados['st_ativo'] = 'S';

            $this->perfilRepository->create($dados);


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