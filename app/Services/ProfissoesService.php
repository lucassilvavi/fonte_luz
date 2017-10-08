<?php
/**
 * Created by PhpStorm.
 * User: lucas.vieira
 * Date: 02/10/2017
 * Time: 18:21
 */

namespace App\Services;

use App\Repositories\UsuarioRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\ProfissaoRepository;
use App\Repositories\RlUsuarioProfissaoRepository;

class ProfissoesService
{
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository,
                                ProfissaoRepository $profissaoRepository,
                                RlUsuarioProfissaoRepository $rlsuarioProfissaoRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->profissaoRepository = $profissaoRepository;
        $this->rlsuarioProfissaoRepository = $rlsuarioProfissaoRepository;

    }

    public function novo($dadosForm)
    {
        DB::beginTransaction();
        try {
            $idUsuario = $this->usuarioRepository->find(auth::user()->id)->id;
            $habiliadade = $this->profissaoRepository->findBy('co_seq_profissao', $dadosForm['habilidade']);
            $habiliadade->usuario()->attach($idUsuario, ['st_profissao_principal' => 'N', 'dt_cadastro' => date("Y-m-d H:i:s"), 'co_seq_usuario_profissao' => $this->rlsuarioProfissaoRepository->getId()]);

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

    public function desativar()
    {
        DB::beginTransaction();
        try {

            $trabalhoAtivo = $this->rlsuarioProfissaoRepository->getTrabalhoAtivo(auth::user()->id);
            if (count($trabalhoAtivo) >= 1) {
                $dataForm['dt_desativacao'] = date("Y-m-d H:i:s");
                $this->rlsuarioProfissaoRepository->update($dataForm, $trabalhoAtivo[0]['co_seq_usuario_profissao'], 'co_seq_usuario_profissao');
            }
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

    function salvarTrabalhoPessoal($co_trabalho)
    {

        DB::beginTransaction();
        try {
            $idUsuario = $this->usuarioRepository->find(auth::user()->id)->id;
            $profissao = $this->profissaoRepository->findBy('co_seq_profissao', $co_trabalho);
            $profissao->usuario()->attach($idUsuario, ['st_profissao_principal' => 'S', 'dt_cadastro' => date("Y-m-d H:i:s"), 'co_seq_usuario_profissao' => $this->rlsuarioProfissaoRepository->getId()]);
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

    public function desativarHabilidade($co_seq_usuario_profissao)
    {
        DB::beginTransaction();
        try {
            $dataForm['dt_desativacao'] = date("Y-m-d H:i:s");
            $this->rlsuarioProfissaoRepository->update($dataForm, $co_seq_usuario_profissao, 'co_seq_usuario_profissao');

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