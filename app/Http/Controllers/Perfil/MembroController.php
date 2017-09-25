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
use App\Repositories\ProfissaoRepository;
use App\Repositories\PaisRepository;
use App\Repositories\CidadeRepository;
use App\Repositories\UnidadeFederativaRepository;
use App\Repositories\UsuarioRepository;

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
    private $profissaoRepository;
    private $paisRepository;
    private $cidadeRepository;
    private $unidadeFederativaRepository;
    private $usuarioRepository;

    public function __construct(Auth $auth,
                                Usuario $usuario,
                                FotoRepository $fotoRepository,
                                ProfissaoRepository $profissaoRepository,
                                PaisRepository $paisRepository,
                                CidadeRepository $cidadeRepository,
                                UnidadeFederativaRepository $unidadeFederativaRepository,
                                UsuarioRepository $usuarioRepository)
    {
        $this->middleware('auth');
        $this->auth = $auth;
        $this->usuario = $usuario;
        $this->fotoRepository = $fotoRepository;
        $this->profissaoRepository = $profissaoRepository;
        $this->paisRepository = $paisRepository;
        $this->cidadeRepository = $cidadeRepository;
        $this->unidadeFederativaRepository = $unidadeFederativaRepository;
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados['cidadeUsuario']=$this->cidadeRepository->findBy('co_seq_cidade',auth::user()->co_cidade);
        $dados['fotos'] = $this->fotoRepository->getFotos();
        $dados['pessoa'] = $this->usuario->find(auth::user()->id);
        $dados['actionPessoal'] = '/editarPessoal';
        $dados['actionTrabalho'] = '/cadastrarTrabalho';
        $dados['profissoes'] = $this->profissaoRepository->getAtiva();
        $dados['paises'] = $this->paisRepository->all();
        $dados['cidades'] = $this->cidadeRepository->all();
        $dados['ufs'] = $this->unidadeFederativaRepository->all();
        $dados['repositoryUsuario'] = $this->usuarioRepository;
        return view('perfil.perfil')->with('dados', $dados);
    }
}
