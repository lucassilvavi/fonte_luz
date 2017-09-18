<?php
/**
 * Created by PhpStorm.
 * User: lucas.vieira
 * Date: 15/09/2017
 * Time: 17:29
 */

namespace App\Http\Controllers\Layout;

use App\Repositories\FotoRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;

abstract class Layout extends Facade
{

    public static function foto(){
        return 'foto';
    }

}

