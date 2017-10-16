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
use App\Repositories\RlUsuarioProfissaoRepository;
use App\Repositories\TelefoneRepository;

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
    private $rlUsuarioProfissaoRepository;
    private $telefoneRepository;

    public function __construct(Auth $auth,
                                Usuario $usuario,
                                FotoRepository $fotoRepository,
                                ProfissaoRepository $profissaoRepository,
                                PaisRepository $paisRepository,
                                CidadeRepository $cidadeRepository,
                                UnidadeFederativaRepository $unidadeFederativaRepository,
                                UsuarioRepository $usuarioRepository,
                                RlUsuarioProfissaoRepository $rlUsuarioProfissaoRepository,
                                TelefoneRepository $telefoneRepository)
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
        $this->rlUsuarioProfissaoRepository = $rlUsuarioProfissaoRepository;
        $this->telefoneRepository = $telefoneRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_usuarioByAdm = null)
    {
        if (isset($id_usuarioByAdm)) {
            return self::indexAdministrador($id_usuarioByAdm);
        }
        $dados['cidadeUsuario'] = $this->cidadeRepository->findBy('co_seq_cidade', auth::user()->co_cidade);
        $dados['fotos'] = $this->fotoRepository->getFotos();
        $dados['pessoa'] = $this->usuario->find(auth::user()->id);
        $dados['actionPessoal'] = '/editarPessoal';
        $dados['actionTrabalho'] = '/cadastrarTrabalho';
        $dados['actionTelefone'] = '/cadastrarTelefone';
        $dados['profissoes'] = $this->profissaoRepository->getAtiva();
        $dados['paises'] = $this->paisRepository->all();
        $dados['cidades'] = $this->cidadeRepository->all();
        $dados['ufs'] = $this->unidadeFederativaRepository->all();
        $dados['repositoryUsuario'] = $this->usuarioRepository;
        $dados['habilidades'] = $this->rlUsuarioProfissaoRepository->getHabilidadesAtivo(auth::user()->id);
        $dados['trabalho'] = $this->rlUsuarioProfissaoRepository->getTrabalhoAtivo(auth::user()->id);
        $dados['telefones'] = $this->telefoneRepository->getTelefonesAtivos(auth::user()->id);
        $dados['usuario'] = $this->usuario->find(auth::user()->id);
        return view('perfil.perfil')->with('dados', $dados);
    }

    function indexAdministrador($id_usuarioByAdm)
    {
        $dados['cidadeUsuario'] = $this->cidadeRepository->findBy('co_seq_cidade', $id_usuarioByAdm);
        $dados['fotos'] = $this->fotoRepository->getExistentes($id_usuarioByAdm);
        $dados['pessoa'] = $this->usuario->find($id_usuarioByAdm);
        $dados['actionPessoal'] = '/editarPessoal';
        $dados['actionTrabalho'] = '/cadastrarTrabalho';
        $dados['actionTelefone'] = '/cadastrarTelefone';
        $dados['profissoes'] = $this->profissaoRepository->getAtiva();
        $dados['paises'] = $this->paisRepository->all();
        $dados['cidades'] = $this->cidadeRepository->all();
        $dados['ufs'] = $this->unidadeFederativaRepository->all();
        $dados['repositoryUsuario'] = $this->usuarioRepository;
        $dados['habilidades'] = $this->rlUsuarioProfissaoRepository->getHabilidadesAtivo($id_usuarioByAdm);
        $dados['trabalho'] = $this->rlUsuarioProfissaoRepository->getTrabalhoAtivo($id_usuarioByAdm);
        $dados['telefones'] = $this->telefoneRepository->getTelefonesAtivos($id_usuarioByAdm);
        $dados['usuario'] = $this->usuario->find($id_usuarioByAdm);

        return view('perfil.perfil')->with('dados', $dados);
    }
}
