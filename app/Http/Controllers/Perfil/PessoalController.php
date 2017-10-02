<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 22/09/2017
 * Time: 19:44
 */

namespace App\Http\Controllers\Perfil;

use App\Http\Requests\PessoalRequest;
use App\Services\PessoalService;


class PessoalController
{
    private $pessoalService;

    public function __construct(PessoalService $pessoalService)
    {
        $this->middleware('auth');
        $this->pessoalService= $pessoalService;
    }

    public function editarPessoal(PessoalRequest $request)
    {
        return $this->pessoalService->editar($request->all());
    }
}