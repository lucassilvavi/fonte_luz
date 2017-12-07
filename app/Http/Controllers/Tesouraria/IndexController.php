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

class IndexController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
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
        dd($request->all());
    }
}