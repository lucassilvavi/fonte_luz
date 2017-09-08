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

class MembroController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $auth;
    private $usuario;

    public function __construct(Auth $auth,Usuario $usuario)
    {
        $this->middleware('auth');
        $this->auth = $auth;
        $this->usuario = $usuario;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oi=$this->usuario->find(auth::user()->id);


        return view('perfil.perfil');
    }
}
