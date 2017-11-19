<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 09/11/2017
 * Time: 20:18
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ComprovanteService;
use App\Repositories\ComprovanteRepository;


class ComprovanteController extends Controller
{
    private $comprovanteService;
    private $comprovanteRepository;

    function __construct(ComprovanteService $comprovanteService,
                         ComprovanteRepository $comprovanteRepository)
    {
        $this->comprovanteService = $comprovanteService;
        $this->comprovanteRepository = $comprovanteRepository;
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

    function excluirComprovante($co_comprovante)
    {
        $endereco = $this->comprovanteRepository->findBy('co_seq_comprovante', $co_comprovante)->ds_endereco_comprovante;
        if (\File::delete($endereco)) {
            return $this->comprovanteRepository->apagarComprovante($co_comprovante);
        }
        return false;
    }

}