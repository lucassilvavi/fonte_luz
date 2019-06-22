<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 07/08/18
 * Time: 16:44
 */

namespace App\Http\Requests;


class FormCadTurmaRequest extends Request
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
            'curso' => 'required',
            'vagas' => 'required',
            'fechamento' => 'required'
        ];
    }
}