<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 06/08/18
 * Time: 23:38
 */

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormCadTurmaRequest;
use App\Http\Requests\FormDesvincularRequest;
use App\Repositories\CursoRepository;
use App\Services\TurmaService;
use App\Repositories\TurmaRepository;
use App\Http\Controllers\Data;
use App\Repositories\UsuarioRepository;
use App\Http\Requests\GenericaRequest;
use App\Services\TurmaUsuarioServices;
use App\Repositories\TurmaUsuarioRepository;

use Gate;

class TurmasController extends Controller
{
    private $cursoRepository;
    private $turmaService;
    private $turmaRepository;
    private $data;
    private $usuarioRepository;
    private $turmaUsuarioServices;
    private $turmaUsuarioRepository;

    public function __construct(
        CursoRepository $cursoRepository,
        TurmaService $turmaService,
        TurmaRepository $turmaRepository,
        Data $data,
        UsuarioRepository $usuarioRepository,
        TurmaUsuarioServices $turmaUsuarioServices,
        TurmaUsuarioRepository $turmaUsuarioRepository
    ) {
        $this->middleware('auth');
        $this->cursoRepository = $cursoRepository;
        $this->turmaService = $turmaService;
        $this->turmaRepository = $turmaRepository;
        $this->data = $data;
        $this->usuarioRepository = $usuarioRepository;
        $this->turmaUsuarioServices = $turmaUsuarioServices;
        $this->turmaUsuarioRepository = $turmaUsuarioRepository;
    }

    public function index($sitacao = null, $curso = null)
    {
        if (Gate::denies('Cadastro')) {
            return redirect()->back();
        }
        $dados['turmas'] = array();
        if ($sitacao != null) {
            if ($sitacao === "andamento") {
                $sitacao = "S";
            } else {
                $sitacao = "N";
            }

            $dados['turmas'] = $this->turmaRepository->getAtivo($sitacao,
                $curso);
        }
        $dados['data'] = $this->data;
        $dados['cursos'] = $this->cursoRepository->getAtivo();
        return view('turma.index')->with('dados', $dados);
    }

    public function modalCadastrar()
    {
        $dados['cursos'] = $this->cursoRepository->getAtivo();
        $dados['action'] = 'Cadastro\TurmasController@save';
        return view('turma.modalCadastro')->with('dados', $dados);
    }

    public function save(FormCadTurmaRequest $request)
    {
        return $this->turmaService->save($request->all());
    }

    public function modalAluno($co_seq_turma)
    {
        $dados['alunos']
            = $this->usuarioRepository->getUsuarioSemTurma($co_seq_turma);
        $dados['turma'] = $this->turmaRepository->find($co_seq_turma);
        $dados['co_seq_turma'] = $co_seq_turma;
        $dados['action'] = 'Cadastro\TurmasController@vincularAluno';

        return view('turma.modalVincAluno')->with('dados', $dados);
    }

    public function modalDesativar($co_seq_turma)
    {
        $dados['co_seq_turma'] = $co_seq_turma;
        return view('turma.modalDesativar')->with('dados', $dados);
    }

    public function desativar($co_seq_turma)
    {
        return $this->turmaService->desativar($co_seq_turma);
    }

    public function vincularAluno(GenericaRequest $request)
    {
        if (empty($request->get('usuarios'))) {
            return ['operacao' => 'vazio'];
        }
        return $this->turmaUsuarioServices->saveAdministrativo($request->all());
    }

    public function modalMatriculados($co_seq_turma)
    {
        $dados['usuarios']
            = $this->turmaUsuarioRepository->getUsuarioVinculados($co_seq_turma);
        $dados['co_seq_turma'] = $co_seq_turma;
        return view('turma.modalMatriculados')->with('dados', $dados);
    }

    public function desmatricular($co_seq_turma_usuario, $id)
    {

        return $this->turmaUsuarioServices->desmatricularAluno($co_seq_turma_usuario,
            $id);
    }

    public function modalDesmatricular($co_seq_turma_usuario)
    {
        $dados['co_seq_turma_usuario'] = $co_seq_turma_usuario;
        $dados['id'] = \Auth::user()->id;
        $dados['action'] = 'Cadastro\TurmasController@desmatricularHome';
        return view('turma.modalDesmatricular')->with('dados', $dados);
    }

    public function desmatricularHome(FormDesvincularRequest $request)
    {
        return $this->turmaUsuarioServices->desmatricularAluno($request->get('co_seq_turma_usuario'),
            $request->get('id'), $request->get('motivo'));
    }

    public function modalMatricular($co_seq_turma)
    {
        $dados['co_seq_turma'] = $co_seq_turma;
        $dados['id'] = \Auth::user()->id;
        return view('turma.modalMatricular')->with('dados', $dados);
    }

    public function saveMatricular($co_seq_turma, $id)
    {
        return $this->turmaUsuarioServices->saveHome($co_seq_turma, $id);
    }

    public function getDadosUsuario($id_usario, $co_seq_turma)
    {

        $dados['usuaro']
            = $this->usuarioRepository->getDadosImportantes($id_usario);
        $dados['data'] = $this->data;
        $dados['co_seq_turma'] = $co_seq_turma;

        return view('turma.dadosPessoaisAlunos')->with('dados', $dados);
    }
}