<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 04/11/2017
 * Time: 13:50
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
class ContribuicaoController extends Controller
{
    function formContribuicao()
    {
        return view('home.modalCadastroContribuicao');
    }

}