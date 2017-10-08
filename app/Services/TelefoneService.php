<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 08/10/2017
 * Time: 12:28
 */

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\TelefoneRepository;
use Illuminate\Support\Facades\Auth;

class TelefoneService
{
    private $telefoneRepository;

    public function __construct(TelefoneRepository $telefoneRepository)
    {
        $this->telefoneRepository = $telefoneRepository;
    }

    public function save($numero, $tipo_telefone)
    {
        DB::beginTransaction();

        try {
            $dados['nu_telefone'] = $numero;
            $dados['tp_telefone'] = $tipo_telefone;
            $dados['st_ativo'] = 'S';
            $dados['id'] = auth::user()->id;
            $this->telefoneRepository->create($dados);

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