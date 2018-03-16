<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 15/03/2018
 * Time: 22:16
 */

namespace App\Http\Requests;

class UpdateRegister extends Request
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
            'no_nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            'password' => 'required|string|min:6|confirmed',
            'nu_cpf' => 'required|string|max:11|',
            'dt_nascimento' => 'required',
            'logradouro' => 'required|string|max:55',
            'bairro' => 'required|string|max:55',
            'co_uf' => 'required',
            'co_cidade' => 'required',
            'vl_contribuicao' => 'required',
        ];
    }

}
