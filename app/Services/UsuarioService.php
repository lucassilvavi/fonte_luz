<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 25/11/2017
 * Time: 12:42
 */

namespace App\Services;

use App\Repositories\UsuarioRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UsuarioService
{
    private $usuarioRepository;

    function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }
    public function editarPerfil($perfil, $usuario)
    {
        DB::beginTransaction();
        try {
            $dados['co_perfil'] = $perfil;
            $this->usuarioRepository->update($dados, $usuario, "id");

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