<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 09/11/2017
 * Time: 20:18
 */

namespace App\Http\Controllers\Contribuicao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ComprovanteService;
use App\Repositories\ComprovanteRepository;
use App\Repositories\ControleContribuicaoRepository;
use Illuminate\Auth;


class ComprovanteController extends Controller
{
    private $comprovanteService;
    private $comprovanteRepository;
    private $controleContribuicaoRepository;

    function __construct(ComprovanteService $comprovanteService,
                         ComprovanteRepository $comprovanteRepository,
                         ControleContribuicaoRepository $controleContribuicaoRepository)
    {
        $this->comprovanteService = $comprovanteService;
        $this->comprovanteRepository = $comprovanteRepository;
        $this->controleContribuicaoRepository = $controleContribuicaoRepository;
    }

    function adicionarComprovante(Request $request)
    {

        $photos = [];
        $photo = $request->image;
        //a stdClass é uma classe pra criar objetos
        $photo_object = new \stdClass();
        $photo_object->name = str_replace('photos/', '', $photo->getClientOriginalName());

        $destinationPath = 'comprovantes/' . \Auth::user()->id;
        //aqui vamos criar o diretorio para salvar a imagem
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $ext = strrchr($photo_object->name, '.');
        $imagem = time() . uniqid(md5($photo_object->name)) . $ext;
        $salvarFoto = $photo->move($destinationPath, $imagem);
        $endereco = $destinationPath . "/" . $imagem;
        if ($salvarFoto) {

            $comprovante = $this->comprovanteService->novo($endereco);
            if ($comprovante != false) {
                return array('comprovante' => $comprovante['id'], 'nome' => $photo_object->name);
            }
        } else {
            return false;
        }
        $photos[] = $photo_object;
        return $photos;
    }

    function excluirComprovante($co_seq_comprovante)
    {

        $endereco = $this->comprovanteRepository->findBy('co_seq_comprovante', $co_seq_comprovante);
        if (\File::delete($endereco->ds_endereco_comprovante)) {
            return $this->comprovanteRepository->apagarComprovante($co_seq_comprovante);
        }
        return false;
    }

    function desativarComprovante($co_seq_comprovante)
    {
        $endero = $this->comprovanteRepository->getComprovanteForDesable($co_seq_comprovante);
        if (isset($endero[0])) {
            return $this->comprovanteService->desativar($co_seq_comprovante);
        }
        return "Aprovado";

    }
    function formEditaComprovante($co_seq_controle_contribuicao)
    {
        $dados['comprovantes'] = $this->comprovanteRepository->getComprovantes($co_seq_controle_contribuicao);
        $dados['baixar'] = "/comprovantes/";
        $dados['action'] = "Contribuicao\ComprovanteController@editarComprovante";
        $dados['co_seq_controle_contribuicao'] = $co_seq_controle_contribuicao;
        return view('contribuicao.modalEditarComprovante')->with('dados', $dados);
    }

    function editarComprovante(Request $request)
    {
        $comprovante = $request->get('comprovante');
        if (isset($comprovante)) {
            return $this->comprovanteService->adiciona($comprovante, $request->get('co_seq_controle_contribuicao'));
        }
        return 'false';
    }

}