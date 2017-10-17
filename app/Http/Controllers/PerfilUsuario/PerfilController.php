<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/09/2017
 * Time: 15:17
 */

namespace App\Http\Controllers\PerfilUsuario;

use App\Repositories\PerfilRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormCadastroPerfilUsuario;
use App\Services\PerfilService;
use App\Repositories\PermissoesRepository;
use App\Http\Requests\GenericaRequest;
use App\Repositories\RlPerfilPermissoesRepository;

class PerfilController extends Controller
{

    public function __construct(PerfilRepository $perfilRepository,
                                PerfilService $perfilService,
                                PermissoesRepository $permissoesRepository,
                                RlPerfilPermissoesRepository $rlPerfilPermissoesRepository)
    {
        $this->middleware('auth');
        $this->perfilRepository = $perfilRepository;
        $this->perfilService = $perfilService;
        $this->permissoesRepository = $permissoesRepository;
        $this->rlPerfilPermissoesRepository = $rlPerfilPermissoesRepository;
    }

    public function index()
    {
        $dados['perfil'] = $this->perfilRepository->all();
        return view('perfilUsuario.index')->with('dados', $dados);
    }

    public function formPerfil($action)
    {
        $dados['action'] = 'PerfilUsuario\\' . $action;
        return view('perfilUsuario.modalFormCadastroPerfil')->with('dados', $dados);
    }

    public function savePerfil(FormCadastroPerfilUsuario $request)
    {
        return $this->perfilService->nova($request->all());

    }

    public function modalPerfilPermissao($co_perfil)
    {
        $dados['action'] = 'PerfilUsuario\PerfilController@savePerfilPermissao';
        $dados['co_perfil'] = $co_perfil;
        $dados['co_permissoes'] = $this->permissoesRepository->all();
        $dados['rlPerfilPermissoesRepository'] = $this->rlPerfilPermissoesRepository;
        return view('perfilUsuario.modalPermissao')->with('dados', $dados);
    }
    public function savePerfilPermissao(GenericaRequest $request)
    {

        return $this->perfilService->vincularPermissaoAPerfil($request->all());
    }
}