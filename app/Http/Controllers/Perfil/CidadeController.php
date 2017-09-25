<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 24/09/2017
 * Time: 11:54
 */

namespace App\Http\Controllers\Perfil;
use App\Http\Controllers\Controller;
use App\Repositories\CidadeRepository;

class CidadeController extends Controller
{
public function __construct(CidadeRepository $cidadeRepository)
{
    $this->cidadeRepository = $cidadeRepository;
}

    public function getCidadeWithUf($sg_uf){

        return $this->cidadeRepository->getCidadeWithUF($sg_uf);
    }
}