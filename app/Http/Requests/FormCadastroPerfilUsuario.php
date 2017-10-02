<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/09/2017
 * Time: 16:26
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;

class FormCadastroPerfilUsuario extends Request
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
            'nome' => 'required',
            'descricao' => 'required',
        ];
    }

}
