<?php
    /**
     * Created by PhpStorm.
     * User: lucas.vieira
     * Date: 10/01/2018
     * Time: 11:56
     */

    namespace App\Http\Controllers\Contribuicao;

    use App\Repositories\UsuarioRepository;

    class PedenteController
    {
        private $usuarioRepository;

        public function __construct(UsuarioRepository $usuarioRepository)
        {
            $this->usuarioRepository = $usuarioRepository;
        }

        public function index()
        {
            $dados['usuarios'] = $this->usuarioRepository->all();
            return view('pendeteContribuicao.index')->with('dados', $dados);
        }
    }