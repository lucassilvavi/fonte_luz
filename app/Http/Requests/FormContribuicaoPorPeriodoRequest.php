<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 11/11/2017
 * Time: 17:24
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;

class FormContribuicaoPorPeriodoRequest extends Request
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
            'demesperiodo' => 'required',
            'deanoperiodo' => 'required',
            'atemesperiodo' => 'required',
            'ateanoperiodo' => 'required',
            'dtdepositoperiodo' => 'required',
            'vlcontribuicaoperiodo' => 'required',
        ];
    }
}