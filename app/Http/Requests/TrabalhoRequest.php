<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 23/09/2017
 * Time: 15:43
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;

class TrabalhoRequest extends Request
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
            'trabPrimeiro' => 'required',
            'trabSefundo' => '',
            'trabTerceiro' => '',
            'trabQuartenario' => '',
        ];
    }

}
