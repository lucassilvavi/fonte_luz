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
            if (!empty($dadosForm['trabPrimeiro'])) {
                $trabalhoAtivo = $this->rlsuarioProfissaoRepository->getTrabalhoAtivo(1);
                if (count($trabalhoAtivo) >= 1) {
                    $this->desativar($trabalhoAtivo[0]['CO_SEQ_USUARIO_PROFISSAO']);
                }
                $primeiroProfissao = $this->profissaoRepository->findBy('co_seq_profissao', $dadosForm['trabPrimeiro']);
                $primeiroProfissao->usuario()->attach($idUsuario, ['st_profissao_principal' => 1, 'dt_cadastro' => date("Y-m-d H:i:s"), 'co_seq_usuario_profissao' => $this->rlsuarioProfissaoRepository->getId()]);
            }
            if (!empty($dadosForm['trabSefundo'])) {
                $trabalhoAtivo = $this->rlsuarioProfissaoRepository->getTrabalhoAtivo(2);
                if (count($trabalhoAtivo) >= 1) {
                    $this->desativar($trabalhoAtivo[0]['CO_SEQ_USUARIO_PROFISSAO']);
                }
                $segundoProfissao = $this->profissaoRepository->findBy('co_seq_profissao', $dadosForm['trabSefundo']);
                $segundoProfissao->usuario()->attach($idUsuario, ['st_profissao_principal' => 2, 'dt_cadastro' => date("Y-m-d H:i:s"), 'co_seq_usuario_profissao' => $this->rlsuarioProfissaoRepository->getId()]);
            }
            if (!empty($dadosForm['trabTerceiro'])) {
                $trabalhoAtivo = $this->rlsuarioProfissaoRepository->getTrabalhoAtivo(3);
                if (count($trabalhoAtivo) >= 1) {
                    $this->desativar($trabalhoAtivo[0]['CO_SEQ_USUARIO_PROFISSAO']);
                }
                $terceiroProfissao = $this->profissaoRepository->findBy('co_seq_profissao', $dadosForm['trabTerceiro']);
                $terceiroProfissao->usuario()->attach($idUsuario, ['st_profissao_principal' => 3, 'dt_cadastro' => date("Y-m-d H:i:s"), 'co_seq_usuario_profissao' => $this->rlsuarioProfissaoRepository->getId()]);
            }
            if (!empty($dadosForm['trabQuartenario'])) {
                $trabalhoAtivo = $this->rlsuarioProfissaoRepository->getTrabalhoAtivo(4);
                if (count($trabalhoAtivo) >= 1) {
                    $this->desativar($trabalhoAtivo[0]['CO_SEQ_USUARIO_PROFISSAO']);
                }
                $quartoProfissao = $this->profissaoRepository->findBy('co_seq_profissao', $dadosForm['trabQuartenario']);
                $quartoProfissao->usuario()->attach($idUsuario, ['st_profissao_principal' => 4, 'dt_cadastro' => date("Y-m-d H:i:s"), 'co_seq_usuario_profissao' => $this->rlsuarioProfissaoRepository->getId()]);
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

    public function desativar($co_seq_usuario_profissao)
    {
        DB::beginTransaction();
        try {

            $dadosForm['dt_desativacao'] = date("Y-m-d H:i:s");
            $this->rlsuarioProfissaoRepository->update($dadosForm, $co_seq_usuario_profissao, 'co_seq_usuario_profissao');

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
    function salvarTrabalho($co_trabalho)
    {

        DB::beginTransaction();
        try {
            $idUsuario = $this->usuarioRepository->find(auth::user()->id)->id;
                $trabalhoAtivo = $this->rlsuarioProfissaoRepository->getTrabalhoAtivo();

                if (count($trabalhoAtivo) >= 1) {
                    $this->desativar($trabalhoAtivo[0]['CO_SEQ_USUARIO_PROFISSAO']);
                }
                $primeiroProfissao = $this->profissaoRepository->findBy('co_seq_profissao', $co_trabalho);
               $primeiroProfissao->usuario()->attach($idUsuario, ['st_profissao_principal' => 'S', 'dt_cadastro' => date("Y-m-d H:i:s"), 'co_seq_usuario_profissao' => $this->rlsuarioProfissaoRepository->getId()]);
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