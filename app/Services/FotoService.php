<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 11/09/2017
 * Time: 17:15
 */

namespace App\Services;

use App\Repositories\FotoRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FotoService
{
    private $fotoRepository;

    public function __construct(FotoRepository $fotoRepository)
    {
        $this->fotoRepository = $fotoRepository;
    }

    public function desativar()
    {
        DB::beginTransaction();

        try {
            $foto = $this->fotoRepository->getAtiva();
            if (isset($foto[0]->CO_SEQ_FOTO)) {
                $dados['st_ativo'] = 'N';
                $dados['dt_desativacao'] = null;
                $this->fotoRepository->update($dados, $foto[0]->CO_SEQ_FOTO, 'CO_SEQ_FOTO');
            }

            DB::commit();
            return 'true';
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

    public function nova($endereco, $idPessoa, $nome)
    {
        DB::beginTransaction();

        try {
            $this->desativar();
            $dados['ds_endereco_foto'] = $endereco;
            $dados['dt_cadastro_foto'] = date("Y-m-d");
            $dados['st_ativo'] = 'S';
            $dados['co_usuario'] = $idPessoa;
            $dados['no_foto'] = $nome;

            $this->fotoRepository->create($dados);

            DB::commit();
            return 'true';
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

    public function ativar($co_seq_foto)
    {
        DB::beginTransaction();

        try {
            $dados['st_ativo'] = 'S';
            $dados['dt_desativacao'] = null;
            $this->fotoRepository->update($dados, $co_seq_foto, 'CO_SEQ_FOTO');

            DB::commit();
            return 'true';
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
    public function delete($co_seq_foto)
    {
        DB::beginTransaction();

        try {
            $dados['st_ativo'] = 'N';
            $dados['dt_desativacao'] = date("Y-m-d");
            $this->fotoRepository->update($dados, $co_seq_foto, 'CO_SEQ_FOTO');

            DB::commit();
            return 'true';
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