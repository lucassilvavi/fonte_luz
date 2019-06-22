<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 06/08/18
 * Time: 18:15
 */

namespace App\Http\Requests;

use App\Http\Requests\Request;
class FormCadCursoRequest extends Request
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
            'notipolancamento' => 'required',
            'dstipolancamento' => 'required'
        ];
    }
}