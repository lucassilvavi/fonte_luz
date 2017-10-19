<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 18/10/2017
 * Time: 20:26
 */

namespace App\Http\Controllers\Facade;
use Illuminate\Support\Facades\Facade;

class PermissoesAtivas extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'permissoes';
    }
}