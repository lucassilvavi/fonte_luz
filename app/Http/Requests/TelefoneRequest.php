<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 08/10/2017
 * Time: 12:39
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;

class TelefoneRequest extends Request
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
            'telefone' => 'required',
            'tipoTelefone' => 'required',
        ];
    }

}
