<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 22/09/2017
 * Time: 19:59
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;

class PessoalRequest extends Request
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
            'no_nome' => 'required',
            'email' => 'required',
            'uf' => 'required',
            'cidade' => '',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cep' => 'required',
            'naturalidade' => 'required',
            'nacionalidade' => 'required',
            'cpf' => 'required',
            'valor' => 'required',
            'profissao' => 'required',
        ];
    }

}
