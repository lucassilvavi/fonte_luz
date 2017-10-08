<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GenericaRequest extends Request
{

    public function authorize() {
        return true;
    }

    public function all() {
        $data = parent::all();
        return $data;
    }

    public function rules()
    {
        return [

        ];
    }

}
