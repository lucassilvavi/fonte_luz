<?php
/**
 * Created by PhpStorm.
 * User: lucas.vieira
 * Date: 09/10/2017
 * Time: 19:53
 */

namespace App\Http\Controllers\GrupoPermissao;

use App\Http\Controllers\Controller;
use App\Repositories\GrupoPermissaoRepository;
use App\Services\GrupoPermissaoService;
use App\Http\Requests\FormCadastroGrupoPermissao;
use App\Repositories\PermissoesRepository;
use App\Http\Requests\GenericaRequest;
use Gate;
class GrupoPermissaoController extends Controller
{
    private $permissoesRepository,
        $grupoPermissaoRepository,
        $grupoPermissaoService;


    public function __construct(GrupoPermissaoRepository $grupoPermissaoRepository,
                                GrupoPermissaoService $grupoPermissaoService,
                                PermissoesRepository $permissoesRepository)
    {
        $this->middleware('auth');
        $this->grupoPermissaoRepository = $grupoPermissaoRepository;
        $this->grupoPermissaoService = $grupoPermissaoService;
        $this->permissoesRepository = $permissoesRepository;
    }

    function index()
    {
        if (Gate::denies('visualizar administração')) {
            return redirect()->back();
        }
        $dados['grupoPermissoes'] = $this->grupoPermissaoRepository->grupoAtivos();

        return view('grupoPermissao.index')->with('dados', $dados);
    }

    function formGrupoPermissao()
    {
        $dados['action'] = 'GrupoPermissao\GrupoPermissaoController@saveGrupoPermissao';
        return view('grupoPermissao.modalCadGrupo')->with('dados', $dados);
    }

    function saveGrupoPermissao(FormCadastroGrupoPermissao $request)
    {
        return $this->grupoPermissaoService->create($request->all());
    }

    function modalGrupoPermissao($co_seq_grupo_permissoes)
    {
        $dados['permissoes'] = $this->permissoesRepository->getPermissoesAtivasProGrupo($co_seq_grupo_permissoes);

        return view('grupoPermissao.modalPermissoes')->with('dados', $dados);
    }

    function formDesableGrupo($co_seq_grupo_permissoes)
    {
        $dados['action'] = 'GrupoPermissao\GrupoPermissaoController@saveDesableGrupo';
        $dados['co_seq_grupo_permissoes'] = $co_seq_grupo_permissoes;

        return view('grupoPermissao.modalDesableGrupo')->with('dados', $dados);
    }

    function saveDesableGrupo(GenericaRequest $request)
    {
        $dados['permissoes'] = $this->permissoesRepository->getPermissoesAtivasProGrupo($request->get('co_seq_grupo_permissoes'));

        if (count($dados['permissoes']) >= 1) {
            return 'false';
        }
        return $this->grupoPermissaoService->desable($request->get('co_seq_grupo_permissoes'));
    }
}