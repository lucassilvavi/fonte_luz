<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 22/11/2017
 * Time: 20:44
 */

namespace App\Http\Requests;


class FormEditarContribuicaoRequest extends Request
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