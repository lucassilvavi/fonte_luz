<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 11/09/2017
 * Time: 17:15
 */

namespace App\Services;

use App\Repositories\FotoRepository;

class FotoService
{
    private $fotoRepository;

    public function __construct(FotoRepository $fotoRepository)
    {
        $this->fotoRepository = $fotoRepository;
    }

    public function desativar()
    {
        $foto = $this->fotoRepository->getAtiva();
        dd($foto);

    }

    public function nova($endereco,$idPessoa)
    {
        $dados['ds_endereco_foto'] = $endereco;
        $dados['dt_cadastro_foto'] = date("Y-m-d h:i:sa");
        $dados['st_ativo'] = 'S';
        dd($dados);
//        $this->desativar();
    }
}