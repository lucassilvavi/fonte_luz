<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\TurmaUsuarioRepository;


class HomeController extends Controller
{
    private $turmaUsuarioRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TurmaUsuarioRepository $turmaUsuarioRepository)
    {
        $this->turmaUsuarioRepository = $turmaUsuarioRepository;
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados['matriculados'] = $this->turmaUsuarioRepository->getCursosByUser(\Auth::user()->id);
        $dados['abertos'] = $this->turmaUsuarioRepository->getCursosAbertor(\Auth::user()->id);


        return view('home.home')->with('dados', $dados);
    }
}
