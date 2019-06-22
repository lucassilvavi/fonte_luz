<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 22/09/2017
 * Time: 19:44
 */

namespace App\Http\Controllers\Perfil;

use App\Http\Requests\PessoalRequest;
use App\Services\PessoalService;
use App\Services\UsuarioService;

use App\Http\Controllers\Controller;

class PessoalController extends Controller
{
    private $pessoalService;
    private $usuarioService;

    public function __construct(PessoalService $pessoalService,
                                UsuarioService $usuarioService)
    {
        $this->pessoalService = $pessoalService;
        $this->usuarioService = $usuarioService;
        $this->middleware('auth');
    }

    public function editarPessoal(PessoalRequest $request)
    {
        return $this->pessoalService->editar($request->all());

    }

    public function modalExluirPerfil($idUsuario)
    {

        return view('perfil.modalExluirPerfil')->with('idUsuario', $idUsuario);
    }

    public function excluirPerfil($idUsuario)
    {
        return $this->usuarioService->excluirUsuario($idUsuario);
    }
}