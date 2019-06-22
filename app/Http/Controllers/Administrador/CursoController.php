<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 06/08/18
 * Time: 17:55
 */

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormCadCursoRequest;
use App\Services\CursoService;
use App\Repositories\CursoRepository;
use Gate;
use App\Http\Controllers\Data;

class CursoController extends Controller
{
    private $cursoService;
    private $cursoRepository;
    private $data;

    public function __construct(CursoService $cursoService,
                                CursoRepository $cursoRepository,
                                Data $data)
    {
        $this->middleware('auth');
        $this->cursoService = $cursoService;
        $this->cursoRepository = $cursoRepository;
        $this->data = $data;
    }

    public function index()
    {
        if (Gate::denies('visualizar administração')) {
            return redirect()->back();
        }
        $dados['data'] = $this->data;
        $dados['cursos'] = $this->cursoRepository->all();

        return view('curso.index')->with('dados', $dados);
    }

    public function modalCadCurso($action = null, $co_seq_curso = null)
    {
        $dados['action'] = 'Administrador\CursoController@saveCurso';

        if ($co_seq_curso != null) {
            $dados['action'] = "Administrador\\$action";
            $dados['curso'] = $this->cursoRepository->find($co_seq_curso);
        }

        return view('curso.modalCadastro')->with('dados', $dados);
    }

    public function saveCurso(FormCadCursoRequest $request)
    {
        return $this->cursoService->save($request->all());
    }

    public function modalDesativar($co_seq_curso)
    {
        $dados['co_seq_curso'] = $co_seq_curso;

        return view('curso.modalDesativar')->with('dados', $dados);
    }

    public function desativarCurso($co_seq_curso)
    {
        return $this->cursoService->desativar($co_seq_curso);
    }

    public function editar(FormCadCursoRequest $request)
    {

        return $this->cursoService->update($request->all());
    }

    public function modalAtivar($co_seq_curso)
    {
        $dados['co_seq_curso'] = $co_seq_curso;

        return view('curso.modalAtivar')->with('dados', $dados);
    }

    public function ativarCurso($co_seq_curso)
    {
        return $this->cursoService->ativar($co_seq_curso);
    }
}