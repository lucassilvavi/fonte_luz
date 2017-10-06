<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 23/09/2017
 * Time: 15:36
 */

namespace App\Http\Controllers\Perfil;

use App\Http\Requests\TrabalhoRequest;
use App\Services\ProfissoesService;

class TrabalhoController
{
    function __construct(ProfissoesService $profissoesService)
    {
        $this->profissoesService = $profissoesService;
    }

    public function cadastrarTrabalho(TrabalhoRequest $request)
    {
        return $this->profissoesService->novo($request->all());
    }
}