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

    public function save($numero, $tipo_telefone,$id)
    {
        DB::beginTransaction();

        try {
            $dados['nu_telefone'] = $numero;
            $dados['tp_telefone'] = $tipo_telefone;
            $dados['st_ativo'] = 'S';
            $dados['id'] = $id;
            $this->telefoneRepository->create($dados);

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
    function desable($co_seq_telefone){

        DB::beginTransaction();

        try {
            $dados['st_ativo'] = 'N';
            $this->telefoneRepository->update($dados,$co_seq_telefone,'co_seq_telefone');
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