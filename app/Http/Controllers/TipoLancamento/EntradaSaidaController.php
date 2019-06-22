<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 31/07/18
 * Time: 10:29
 */

namespace App\Http\Controllers\TipoLancamento;

use App\Repositories\TipoLancamentoRepository;
use App\Http\Controllers\Data;
use App\Http\Requests\FormEntradaSaidaRequest;
use App\Services\FinanceiroService;
use App\Http\Controllers\Controller;
use Gate;
use App\Repositories\FinanceiroRepository;

class EntradaSaidaController extends Controller
{
    private $tipoLancamentoRepository;
    private $data;
    private $financeiroService;
    private $financeiroRepository;

    public function __construct(TipoLancamentoRepository $tipoLancamentoRepository,
                                Data $data,
                                FinanceiroService $financeiroService,
                                FinanceiroRepository $financeiroRepository)
    {
        $this->middleware('auth');
        $this->tipoLancamentoRepository = $tipoLancamentoRepository;
        $this->data = $data;
        $this->financeiroService = $financeiroService;
        $this->financeiroRepository = $financeiroRepository;
    }

    public function index($periodeDe = null, $periodeAte = null, $nt_lancamento = null, $tipo_lancamento = null)
    {
        if (Gate::denies('visualizar administração')) {
            return redirect()->back();
        }
        $dados['periodeDe'] = $this->data->formatarDataBR($periodeDe);
        $dados['periodeAte'] = $this->data->formatarDataBR($periodeAte);
        $dados['nt_lancamento'] = $nt_lancamento;
        $dados['tipo_lancamento'] = $tipo_lancamento;

        $dados['dadosFinanceiro'] = array();


        if ($periodeDe != null) {
            $dados['dadosFinanceiro'] = $this->financeiroRepository
                ->getDados($this->data->dataSqlBR($periodeDe), $this->data->dataSqlBR($periodeAte),
                    $nt_lancamento, $tipo_lancamento);
            $dados['dataRepository'] = $this->data;
            $dados['meses'] = $this->data->mes();
        }
        $dados['tipoLanc'] = $this->tipoLancamentoRepository->getAtivos();

        return view('entradaSaida.index')->with('dados', $dados);
    }

    public function modalCadastro($co_seq_financeiro = null, $action = null)
    {
        $dados['action'] = "TipoLancamento\EntradaSaidaController@salvar";
        $dados['financeiro'] = array();
        if ($co_seq_financeiro != null) {
            $dados['financeiro'] = $this->financeiroRepository->find($co_seq_financeiro);
            $dados['action'] = "TipoLancamento\\" . $action;

        }
        $dados['tipoLanc'] = $this->tipoLancamentoRepository->getAtivos();
        $dados['meses'] = $this->data->mes();
        $dados['data'] = $this->data;
        $dados['anos'] = $this->data->getAnoAte(2010);

        return view('entradaSaida.modalCadastro')->with('dados', $dados);
    }

    public function salvar(FormEntradaSaidaRequest $request)
    {
        return $this->financeiroService->save($request->all());
    }

    public function editar(FormEntradaSaidaRequest $request)
    {
        return $this->financeiroService->update($request->all());
    }

    public function modalEstorno($co_seq_financeiro)
    {
        $dados['co_seq_financeiro'] = $co_seq_financeiro;
        return view('entradaSaida.modalEstornar')->with('dados', $dados);
    }

    public function estonar($co_seq_financeiro)
    {
        return $this->financeiroService->estorno($co_seq_financeiro);
    }
}