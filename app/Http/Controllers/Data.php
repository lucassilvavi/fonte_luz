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

    public function mes()
    {
        return array(1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho",
            7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
    }

    public function getMesByKey($key)
    {
        foreach (self::mes() as $k => $mes) {
            if ($k == $key) {
                return $mes;
            }
        }
    }

    public function ano()
    {
        $ano = date('Y');
        return array($ano + 1 => $ano + 1, $ano => $ano, $ano - 1 => $ano - 1, $ano - 2 => $ano - 2);
    }

    public function montaData($mes, $ano)
    {
        $data = "01-$mes-$ano";
        return date('Y-m-d', strtotime($data));
    }

    public function formatarDataBR($data)
    {
        return date('d/m/Y', strtotime($data));
    }

    public function getMes($data)
    {
        $dataForm = date('d/m/Y', strtotime($data));
        return str_replace(0, "", substr($dataForm, 3, 2));

    }

    public function getAno($data)
    {
        $dataForm = date('d/m/Y', strtotime($data));
        return substr($dataForm, 6, 4);
    }

    public function dataSql($data)
    {
        $data = str_replace("-", "-", $data);
        $dataForm = date('Y-m-d', strtotime($data));
        return "'$dataForm'";
    }

    public function dataSqlBR($data)
    {
        $data = str_replace("/", "-", $data);
        $dataForm = date('Y-m-d', strtotime($data));
        return "$dataForm";
    }

    public function getAnoAte($anoInicio)
    {
        $ano = date('Y');
        $keys = range($anoInicio, $ano);
        return array_combine($keys, $keys);
    }
}