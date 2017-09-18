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

class Foto
{

    public function getFoto()
    {
        $idUsuarioLogado = \Illuminate\Support\Facades\Auth::user()->id;

        return DB::select('SELECT DS_ENDERECO_FOTO FROM tb_foto WHERE CO_USUARIO = '.$idUsuarioLogado.' AND ST_ATIVO = "S"');
    }
}