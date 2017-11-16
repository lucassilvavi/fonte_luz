<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 16/11/2017
 * Time: 21:09
 */

namespace App\Http\Controllers;


class Data
{

    function mes()
    {
        return array(1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho",
            7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
    }

    function ano()
    {
        $ano = date('Y');
        return array($ano => $ano, $ano - 1 => $ano - 1, $ano + 1 => $ano + 1);
    }
}