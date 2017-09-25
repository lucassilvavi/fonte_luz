<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 23/09/2017
 * Time: 15:36
 */

namespace App\Http\Controllers\Perfil;
use App\Http\Requests\TrabalhoRequest;

class TrabalhoController
{
    public function cadastrarTrabalho(TrabalhoRequest $request)
    {
dd($request->all());
    }
}