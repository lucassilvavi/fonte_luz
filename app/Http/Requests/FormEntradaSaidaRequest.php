<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 31/07/18
 * Time: 16:48
 */

namespace App\Http\Requests;


class FormEntradaSaidaRequest extends Request
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
            'tpLancamento' => 'required',
            'ntLancamento' => 'required',
            'dtLiquidacao' => 'required',
            'mes' => 'required',
            'ano' => 'required',
            'valor' => 'required',
            'descricao' => 'required'
        ];
    }
}