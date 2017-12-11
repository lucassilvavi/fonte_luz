<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 28/11/2017
 * Time: 20:24
 */

namespace App\Http\Controllers\Tesouraria;


use App\Http\Controllers\Controller;
use App\Repositories\UsuarioRepository;
use Illuminate\Http\Request;
use App\Repositories\ControleContribuicaoRepository;

class IndexController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $usuarioRepository;
    private $controleContribuicaoRepository;

    public function __construct(UsuarioRepository $usuarioRepository,
                                ControleContribuicaoRepository $controleContribuicaoRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->controleContribuicaoRepository = $controleContribuicaoRepository;
        $this->middleware('auth');

    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados['usuarios'] = $this->usuarioRepository->all();
        $dados['action'] = "Tesouraria\IndexController@getContribuicoes";

        return view('tesouraria.index')->with('dados', $dados);
    }

    public function getContribuicoes(Request $request)
    {
        $dadosForm = $request->all();
        if (!isset($dadosForm['classificacaoPagamento']) && empty($dadosForm['membro'])) {
            //tenho que escrever uma função pra me trazer a data formatada

            $data = str_replace("/", "-", $_POST["data1"]);
            echo date('Y-m-d', strtotime($data));
            $de = date('Y-m-d', strtotime($dadosForm['periodeDe']));
            $ate = date('Y-m-d', strtotime($dadosForm['periodeAte']));
            dd($de);

            $oi = $this->controleContribuicaoRepository->getContribuicaoPorPeriodo($de,$ate);

            dd($oi);
        } else if (!isset($dadosForm['classificacaoPagamento'])) {

        } elseif (!isset($dadosForm['membro'])) {

        }

    }
}