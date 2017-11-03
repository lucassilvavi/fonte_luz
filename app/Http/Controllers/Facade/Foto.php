<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 17/09/2017
 * Time: 11:39
 */

namespace App\Http\Controllers\Facade;

use Illuminate\Support\Facades\DB;
use App\Repositories\FotoRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class Foto extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getFoto()
    {

        $idUsuarioLogado = \Illuminate\Support\Facades\Auth::user()->id;
        return DB::select('SELECT ds_endereco_foto FROM tb_foto WHERE id = '.$idUsuarioLogado.' AND st_ativo = "S"');
    }
}