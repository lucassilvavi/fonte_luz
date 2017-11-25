<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 25/11/2017
 * Time: 12:32
 */

namespace App\Http\Controllers\Perfil;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UsuarioService;

class PerfilController extends Controller
{
    private $usuarioService;

    function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    function editarPerfil(Request $request)
    {
        return $this->usuarioService->editarPerfil($request->get('perfil'), $request->get('usuario'));
    }
}