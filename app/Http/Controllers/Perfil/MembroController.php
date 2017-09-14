<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 07/09/2017
 * Time: 18:14
 */

namespace App\Http\Controllers\Perfil;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
Use App\Models\Usuario;
use App\Repositories\FotoRepository;

class MembroController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $auth;
    private $usuario;
    private $fotoRepository;

    public function __construct(Auth $auth,
                                Usuario $usuario,
                                FotoRepository $fotoRepository)
    {
        $this->middleware('auth');
        $this->auth = $auth;
        $this->usuario = $usuario;
        $this->fotoRepository = $fotoRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados['fotos'] = $this->fotoRepository->all();
        $dados['pessoa'] = $this->usuario->find(auth::user()->id);
        return view('perfil.perfil')->with('dados', $dados);
    }
}
