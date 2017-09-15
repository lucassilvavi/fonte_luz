<?php
/**
 * Created by PhpStorm.
 * User: lucas.vieira
 * Date: 15/09/2017
 * Time: 17:08
 */

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use App\Repositories\FotoRepository;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    private $fotoRepository;
    private $auth;

    public function __construct(FotoRepository $fotoRepository,
                                Auth $auth)
    {
        $this->fotoRepository = $fotoRepository;
        $this->auth = $auth;
    }

    public function index()
    {
        $dados['foto'] = $this->fotoRepository->findBy('co_usuario', auth::user()->id)->where('st_ativo', 'S')->get();
        return view('layouts.principal')->with('dados', $dados);

    }
}