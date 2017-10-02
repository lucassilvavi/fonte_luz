<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/09/2017
 * Time: 18:52
 */

namespace App\Http\Controllers\Permissoes;

use App\Http\Controllers\Controller;
use App\Repositories\PermissoesRepository;
use App\Http\Requests\FormCadastroPermissao;
use App\Services\PermissaoService;

class PermissaoController extends Controller
{
    public function __construct(PermissoesRepository $permissoesRepository,
                                PermissaoService $permissaoService)
    {
        $this->middleware('auth');
        $this->permissoesRepository = $permissoesRepository;
        $this->permissaoService = $permissaoService;
    }

    public function index()
    {
        $dados['permissoes'] = $this->permissoesRepository->all();
        return view('permissoes.index')->with('dados', $dados);
    }

    function formPerfil($action)
    {
        $dados['action'] = 'Permissoes\\' . $action;
        return view('permissoes.modalFormCadastroPermissao')->with('dados', $dados);
    }

    function savePermissao(FormCadastroPermissao $request)
    {
        return $this->permissaoService->nova($request->all());
    }
    function modalDetalhePermissao($co_permissao){

        return view('permissoes.modalDetalhePermissao');
    }
}