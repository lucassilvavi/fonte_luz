<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/07/18
 * Time: 16:14
 */

namespace App\Http\Requests;


class FormTipoLancamentoRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function all()
    {
        $data = parent::all();
        return $data;
    }

    public function rules()
    {
        return [
            'no_tipo_lancamento' => 'required',
            'ds_tipo_lancamento' => 'required',
            'st_ativo' => 'required'
        ];
    }
}