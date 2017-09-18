<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 17/09/2017
 * Time: 11:51
 */

namespace App\Http\Controllers\Facade;

use Illuminate\Support\Facades\Facade;

class FotoAtiva extends Facade
{
  public static function getFacadeAccessor()
  {
    return 'foto';
  }
}