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
use App\Repositories\RlPerfilPermissoesRepository;
use App\Repositories\PermissoesRepository;

class PerfilService
{
    private $perfilRepository;
    private $rlPerfilPermissoesRepository;
    private $permissoesRepository;

    public function __construct(PerfilRepository $perfilRepository,
                                RlPerfilPermissoesRepository $rlPerfilPermissoesRepository,
                                PermissoesRepository $permissoesRepository)
    {
        $this->perfilRepository = $perfilRepository;
        $this->rlPerfilPermissoesRepository = $rlPerfilPermissoesRepository;
        $this->permissoesRepository = $permissoesRepository;
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
        }
    }

    public function vincularPermissaoAPerfil($dadosForm)
    {
        DB::beginTransaction();
        try {

            if (empty($dadosForm['permissoes'])) {

                self::desativarTodasAsPermissoes($dadosForm['perfil']);
            }else{
                foreach ($dadosForm['permissoes'] as $permissao) {

                    $vinculado = $this->rlPerfilPermissoesRepository->getPerfilVinculadoAPermissao($permissao, $dadosForm['perfil']);

                    if (count($vinculado) == 0) {
                        $dadosPermissao = $this->permissoesRepository->findBy('co_seq_permissoes', $permissao);
                        $dadosPermissao->perfil()->attach($dadosForm['perfil'], ['dt_cadastro' => date("Y-m-d H:i:s"), 'co_seq_perfil_permissoes' => $this->rlPerfilPermissoesRepository->getId()]);
                    }
                }
                self::desativarPermissao($dadosForm['permissoes'], $dadosForm['perfil']);
            }

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

    public function desativarPermissao($permissoesSelecionadas, $co_perfil)
    {
        DB::beginTransaction();
        try {

            $ativosParaDesativar = $this->rlPerfilPermissoesRepository->getPermissoesParaDesativar($permissoesSelecionadas, $co_perfil);

            if (count($ativosParaDesativar) >= 1) {
                foreach ($ativosParaDesativar as $desativar) {
                    $dados['dt_exclusao'] = date("Y-m-d");
                    $this->rlPerfilPermissoesRepository->update($dados, $desativar->co_seq_perfil_permissoes, 'co_seq_perfil_permissoes');
                }
            }

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
    public function desativarTodasAsPermissoes( $co_perfil)
    {
        DB::beginTransaction();
        try {

            $ativosParaDesativar = $this->rlPerfilPermissoesRepository->getPermissoesAtivasParaPermissao( $co_perfil);
            if (count($ativosParaDesativar) >= 1) {
                foreach ($ativosParaDesativar as $desativar) {
                    $dados['dt_exclusao'] = date("Y-m-d");
                    $this->rlPerfilPermissoesRepository->update($dados, $desativar->co_seq_perfil_permissoes, 'co_seq_perfil_permissoes');
                }
            }

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