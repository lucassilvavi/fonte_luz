<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 19/11/2017
 * Time: 18:46
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;

class FormContribuicaoPorMes extends Request
{
    public function authorize() {
        return true;
    }

    public function all() {
        $data = parent::all();
        return $data;
    }

    public function rules() {
        return [
            'demes' => 'required',
            'anoMes' => 'required',
            'dtdepositomes' => 'required',
            'vlcontribuicaomes' => 'required',
        ];
    }
}