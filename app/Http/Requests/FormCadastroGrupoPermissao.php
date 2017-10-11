<?php
/**
 * Created by PhpStorm.
 * User: lucas.vieira
 * Date: 09/10/2017
 * Time: 20:21
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;

class FormCadastroGrupoPermissao extends Request
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
            'descricao_grupo' => 'required',
        ];
    }

}
