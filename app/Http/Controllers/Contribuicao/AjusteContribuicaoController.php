<?php
    /**
     * Created by PhpStorm.
     * User: lucas.vieira
     * Date: 08/01/2018
     * Time: 10:48
     */

    namespace App\Http\Controllers\Contribuicao;

use App\Repositories\UsuarioRepository;


class AjusteContribuicaoController extends ContribuicaoController
    {
        private $usuarioRepository;
        public function __construct(UsuarioRepository $usuarioRepository)
        {
         $this->usuarioRepository = $usuarioRepository;
        }

        public function index()
        {
            $dados['usuarios'] = $this->usuarioRepository->all();
            return view('contribuicao.ajuste.ajusteContribuicao')->with('dados',$dados);
        }
    }