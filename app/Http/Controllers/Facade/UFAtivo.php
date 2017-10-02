<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 01/10/2017
 * Time: 13:32
 */

namespace App\Http\Controllers\Facade;

use Illuminate\Support\Facades\Facade;

class UFAtivo extends Facade
{


    public static function getFacadeAccessor()
    {
        return 'uf';
    }
}