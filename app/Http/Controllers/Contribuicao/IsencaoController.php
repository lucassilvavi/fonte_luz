<?php
    /**
     * Created by PhpStorm.
     * User: lucas.vieira
     * Date: 21/12/2017
     * Time: 10:19
     */

    namespace App\Http\Controllers\Contribuicao;


    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Data;
    use App\Repositories\UsuarioRepository;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Requests\FormIsencaoContribuicaoRequest;
    use App\Services\IsencaoContribuicaoService;
    use App\Repositories\IsencaoContribuicaoRepository;
    use Gate;

    class IsencaoController extends Controller
    {
        private $data;
        private $usuarioRepository;
        private $isencaoContribuicaoService;
        private $isencaoContribuicaoRepository;

        public function __construct(Data $data,
                                    UsuarioRepository $usuarioRepository,
                                    IsencaoContribuicaoService $isencaoContribuicaoService,
                                    IsencaoContribuicaoRepository $isencaoContribuicaoRepository)
        {
            $this->middleware('auth');
            $this->data = $data;
            $this->usuarioRepository = $usuarioRepository;
            $this->isencaoContribuicaoService = $isencaoContribuicaoService;
            $this->isencaoContribuicaoRepository = $isencaoContribuicaoRepository;
        }

        public function index()
        {
            if (Gate::denies('isencao de contribuicao')) {
                return redirect()->back();
            }
            $dados['isencoes'] = $this->isencaoContribuicaoRepository->all();
            $dados['data'] = $this->data;

            return view('isencaoContribuicao.index')->with('dados', $dados);
        }

        public function modalCadastroIsencao()
        {
            $dados['anos'] = $this->data->ano();
            $dados['meses'] = $this->data->mes();
            $dados['usuario'] = $this->usuarioRepository->getUsuarioMenosProprio(auth::user()->id);
            $dados['action'] = "Contribuicao\IsencaoController@saveCadastroIsencao";

            return view('isencaoContribuicao.modalCadastroIsencao')->with('dados', $dados);

        }

        public function saveCadastroIsencao(FormIsencaoContribuicaoRequest $request)
        {
            return $this->isencaoContribuicaoService->create($request->all());
        }

        public function modalEditarIsencao($co_seq_isencao_contribuicao)
        {
            $dados['atemes'] = false;
            $dados['ateano'] = false;
            $dados['isencao'] = $this->isencaoContribuicaoRepository->find($co_seq_isencao_contribuicao);
            $dados['demes'] = $this->data->getMes($dados['isencao']->dt_inicio_vigencia);
            $dados['deano'] = $this->data->getAno($dados['isencao']->dt_inicio_vigencia);

            if (!empty($dados['isencao']->dt_fim_vigencia)) {

                $dados['atemes'] = $this->data->getMes($dados['isencao']->dt_fim_vigencia);
                $dados['ateano'] = $this->data->getAno($dados['isencao']->dt_fim_vigencia);
            }
            $dados['anos'] = $this->data->ano();
            $dados['meses'] = $this->data->mes();
            $dados['usuario'] = $this->usuarioRepository->getUsuarioMenosProprio(auth::user()->id);
            $dados['co_seq_isencao_contribuicao'] = $co_seq_isencao_contribuicao;
            $dados['action'] = "Contribuicao\IsencaoController@saveEditarIsencao";

            return view('isencaoContribuicao.modalEditarIsencao')->with('dados', $dados);
        }

        public function saveEditarIsencao(FormIsencaoContribuicaoRequest $request)
        {

            return $this->isencaoContribuicaoService->update($request->all(), $request->get('co_seq_isencao_contribuicao'));

        }
    }