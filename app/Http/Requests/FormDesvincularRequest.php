<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 08/08/18
 * Time: 15:31
 */

namespace App\Http\Requests;


class FormDesvincularRequest extends Request
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
            'motivo' => 'required'
        ];
    }
}