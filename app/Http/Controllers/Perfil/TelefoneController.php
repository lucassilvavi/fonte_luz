<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 08/10/2017
 * Time: 12:30
 */

namespace App\Http\Controllers\Perfil;

use App\Http\Controllers\Controller;
use App\Services\TelefoneService;
use App\Http\Requests\TelefoneRequest;
use Illuminate\Support\Facades\Auth;

class TelefoneController extends Controller
{
    private $telefoneService;

    public function __construct(TelefoneService $telefoneService)
    {
        $this->telefoneService = $telefoneService;

    }

    function cadastrarTelefone(TelefoneRequest $request)
    {
        $onlyNumbers = preg_replace('/\D/', '', $request->get('telefone'));
       return $this->telefoneService->save($onlyNumbers,$request->get('tipoTelefone'));

    }
}