<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 01/10/2017
 * Time: 13:30
 */

namespace App\Http\Controllers\Facade;
use Illuminate\Support\Facades\DB;
use App\Repositories\UnidadeFederativaRepository;
use Illuminate\Support\Facades\Auth;

class Uf
{
    public function getUf()
    {

        return DB::select('SELECT * FROM tb_unidade_federativa');
    }
}