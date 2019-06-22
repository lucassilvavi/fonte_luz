<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/07/18
 * Time: 12:13
 */

namespace App\Http\Controllers\TipoLancamento;

use App\Repositories\TipoLancamentoRepository;
use App\Http\Requests\FormTipoLancamentoRequest;
use App\Services\TipoLancamentoService;
use App\Http\Controllers\Controller;
use Gate;

class LancamentoController extends Controller
{
    private $tipoLancamentoRepository;
    private $tipoLancamentoService;

    public function __construct(TipoLancamentoRepository $tipoLancamentoRepository,
                                TipoLancamentoService $tipoLancamentoService)
    {
        $this->tipoLancamentoRepository = $tipoLancamentoRepository;
        $this->tipoLancamentoService = $tipoLancamentoService;
        $this->middleware('auth');

    }

    public function index()
    {
        if (Gate::denies('visualizar administração')) {
            return redirect()->back();
        }
        $dados['lancamentos'] = $this->tipoLancamentoRepository->all();

        return view('tipoLacamento.index')->with('dados', $dados);
    }

    public function modalCadastro()
    {
        $dados['action'] = "TipoLancamento\LancamentoController@salvar";

        return view('tipoLacamento.modalCadastro')->with('dados', $dados);
    }

    public function modalEditar($co_seq_tipo_lancamento)
    {
        $dados['tipoLancamento'] = $this->tipoLancamentoRepository->find($co_seq_tipo_lancamento);
        $dados['action'] = "TipoLancamento\LancamentoController@editar";


        return view('tipoLacamento.modalCadastro')->with('dados', $dados);
    }

    public function salvar(FormTipoLancamentoRequest $request)
    {

        return $this->tipoLancamentoService->save($request->all());
    }

    public function editar(FormTipoLancamentoRequest $request)
    {
        return $this->tipoLancamentoService->edit($request->all());
    }
}