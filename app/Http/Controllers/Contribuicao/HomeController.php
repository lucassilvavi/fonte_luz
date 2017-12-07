<?php

namespace App\Http\Controllers\Contribuicao;

use Illuminate\Http\Request;
use App\Repositories\ControleContribuicaoRepository;
use App\Http\Controllers\Controller;
use JansenFelipe\Utils\Utils;

class HomeController extends Controller
{
    private $controleContribuicaoRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ControleContribuicaoRepository $controleContribuicaoRepository)
    {
        $this->middleware('auth');
        $this->controleContribuicaoRepository = $controleContribuicaoRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados['contribuicoes'] = $this->controleContribuicaoRepository->getContribuicaoAtiva(\auth::user()->id);

        return view('contribuicao.home')->with('dados', $dados);
    }
}