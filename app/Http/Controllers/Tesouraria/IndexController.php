<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 28/11/2017
 * Time: 20:24
 */

namespace App\Http\Controllers\Tesouraria;


use App\Http\Controllers\Controller;
use App\Http\Requests\FormDesvincularRequest;
use App\Http\Requests\GenericaRequest;
use App\Repositories\UsuarioRepository;
use Illuminate\Http\Request;
use App\Repositories\ControleContribuicaoRepository;
use App\Repositories\ComprovanteRepository;
use App\Services\ControleContribuicaoService;
use Gate;


class IndexController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $usuarioRepository;
    private $controleContribuicaoRepository;
    private $comprovanteRepository;
    private $controleContribuicaoService;

    public function __construct(
        UsuarioRepository $usuarioRepository,
        ControleContribuicaoRepository $controleContribuicaoRepository,
        ComprovanteRepository $comprovanteRepository,
        ControleContribuicaoService $controleContribuicaoService
    ) {
        $this->usuarioRepository = $usuarioRepository;
        $this->controleContribuicaoRepository = $controleContribuicaoRepository;
        $this->comprovanteRepository = $comprovanteRepository;
        $this->controleContribuicaoService = $controleContribuicaoService;
        $this->middleware('auth');

    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('tesouraria')) {
            return redirect()->back();
        }
        $dados['usuarios'] = $this->usuarioRepository->all();

        return view('tesouraria.index')->with('dados', $dados);
    }

    public function valueNull($parament)
    {
        if ($parament == "null") {
            return $parament = null;
        }
        return $parament;
    }

    public function getContribuicoes($classificacaoPagamentoS, $periodeDeS, $periodeAteS, $membroS) {
        $classificacaoPagamento = self::valueNull($classificacaoPagamentoS);
        $periodeDe = self::valueNull($periodeDeS);
        $periodeAte = self::valueNull($periodeAteS);
        $membro = self::valueNull($membroS);
        $periodeDe =  !is_null($periodeDe)?self::dataFomatada($periodeDe):$periodeDe;
        $periodeAte =  !is_null($periodeAte)?self::dataFomatada($periodeAte):$periodeAte;
        $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicao($classificacaoPagamento,$periodeDe,$periodeAte,$membro);

        return view('tesouraria.dataTableContribuicao')->with('dados', $dados);

    }

    public function dataFomatada($data)
    {
        $data = str_replace("-", "-", $data);
        $dataForm = date('Y-m-d', strtotime($data));
        return "'$dataForm'";
    }

    public function formComprovante($co_seq_controle_contribuicao)
    {
        $dados['comprovantes']
            = $this->comprovanteRepository->getComprovantes($co_seq_controle_contribuicao);
        $dados['baixar'] = "/comprovantes/";
        return view('tesouraria.comprovante')->with('dados', $dados);
    }

    public function formObservacao($co_seq_controle_contribuicao)
    {

        $dados['contribuicao']
            = $this->controleContribuicaoRepository->find($co_seq_controle_contribuicao);
        $dados['action'] = 'Tesouraria\IndexController@saveObservacao';
        return view('tesouraria.observacao')->with('dados', $dados);
    }

    public function saveObservacao(Request $request)
    {
        $dados['form'] = $request->all();
        return $this->controleContribuicaoService->editarObservacao(trim($dados['form']['observacao']),
            $dados['form']['co_seq_controle_contribuicao']);
    }

    public function formConfirmaContribuicao($co_seq_controle_contribuicao)
    {
        $dados = $co_seq_controle_contribuicao;
        return view('tesouraria.modalConfirmaContribuicao')->with('dados',
            $dados);
    }

    public function saveConfirmacaoContribuicao($co_seq_controle_contribuicao)
    {
        return $this->controleContribuicaoService->confirmaContribuicao($co_seq_controle_contribuicao);
    }

    public function formReprovaContribuicao($co_seq_controle_contribuicao)
    {
        $dados['co_seq_controle_contribuicao'] = $co_seq_controle_contribuicao;
        $dados['action'] = "/tesouraria/saveReprovaContribuicao";

        return view('tesouraria.modalReprovaContribuicao')->with('dados',
            $dados);
    }

    public function saveReprovaContribuicao(FormDesvincularRequest $request)
    {

        $resultado
            = $this->controleContribuicaoService->reprovaContribuicao($request->get('co_seq_controle_contribuicao'),
            $request->get('motivo'));

        if ($resultado['operacao'] == false) {
            return ['operacao' => false];
        } else {
            return [
                'operacao' => true,
                'id'       => $resultado['id']
            ];
        }
    }

    public function saveAprovarSelecionados(GenericaRequest $request)
    {
        $contribuicoes = $request->get('form');
        foreach ($contribuicoes as $k => $contribuicao) {

            $resultados[]
                = $this->controleContribuicaoService->confirmaContribuicao($contribuicao);
        }
        foreach ($resultados as $resultado) {
            $testeResultado[] = in_array(false, $resultado);
        }
        if (in_array(true, $testeResultado)) {
            return ['operacao' => false];
        } else {
            return ['operacao' => true];
        }
    }

    public function saveReprovacaoSelecionados(FormDesvincularRequest $request)
    {

        $contribuicoes
            = json_decode($request->get('co_seq_controle_contribuicao'));
        foreach ($contribuicoes as $k => $contribuicao) {

            $resultados[]
                = $this->controleContribuicaoService->reprovaContribuicao($contribuicao,
                $request->get('motivo'));
        }
        foreach ($resultados as $resultado) {
            $testeResultado[] = in_array(false, $resultado);
        }
        if (in_array(true, $testeResultado)) {
            return ['operacao' => false];
        } else {
            return [
                'operacao' => true,
                'id'       => 'varios'
            ];
        }
    }

    public function formReprovaContribuicaoSelecionados(
        $co_seq_controle_contribuicao
    ) {

        $dados['co_seq_controle_contribuicao'] = $co_seq_controle_contribuicao;
        $dados['action'] = "/tesouraria/saveReprovacaoSelecionados";

        return view('tesouraria.modalReprovaContribuicao')->with('dados',
            $dados);
    }


}