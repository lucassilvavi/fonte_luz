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

use App\Http\Controllers\Controller;
class PessoalController extends Controller
{
    private $pessoalService;

    public function __construct(PessoalService $pessoalService)
    {
        $this->pessoalService= $pessoalService;
        $this->middleware('auth');
    }

    public function editarPessoal(PessoalRequest $request)
    {
        return $this->pessoalService->editar($request->all());

    }
}