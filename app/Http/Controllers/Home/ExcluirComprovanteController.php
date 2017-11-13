<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 11/11/2017
 * Time: 13:51
 */

namespace App\Http\Controllers\Home;

use App\Repositories\ComprovanteRepository;
use App\Http\Controllers\Controller;


class ExcluirComprovanteController extends Controller
{
    private $comprovanteRepository;

    function __construct(ComprovanteRepository $comprovanteRepository)
    {
        $this->comprovanteRepository = $comprovanteRepository;
    }

    function excluirComprovante($co_comprovante)
    {
        $endereco = $this->comprovanteRepository->findBy('co_seq_comprovante',$co_comprovante)->ds_endereco_comprovante;
        if(\File::delete($endereco)){
            return $this->comprovanteRepository->apagarComprovante($co_comprovante);
        }
        return false;


    }
}