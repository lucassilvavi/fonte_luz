<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest,
    Illuminate\Contracts\Validation\Validator;

abstract class Request extends FormRequest {

    protected function formatErrors(Validator $validator) {
        return $validator->errors()->all();
    }

    public function response(array $errors) {
        $error = $this->trResponse($errors);
        return response($error);
    }

    public function messages() {
        return [
            'required' => '{":attribute":"Este campo é obrigatório."}',
            'digits' => '{":attribute":"Este campo deve ter :digits dígitos."}',
            'alpha' => '{":attribute":"Este campo deve conter somente letras."}',
            'numeric' => '{":attribute":"Este campo deve conter apenas números."}',
            'regex' => '{":attribute":"Formato do campo é inválido"}',
            'unique' => '{":attribute":"Este valor já esta em uso."}',
            'cpf' => '{":attribute":"Este CPF é invalido."}',
            'email' => '{":attribute":"Este campo deve ser um endereço de e-mail válido."}',
            'digits_between' => '{":attribute":"Este campo deve ter entre :min e :max dígitos."}',
            'max' => '{":attribute":"O Campo não deve ser maior que :max."}'
        ];
    }

    protected function trResponse(array $errors) {
        foreach ($errors as $i => $e) {
            $decodeJson = json_decode($e, true);
            $string = explode('.', key($decodeJson));

            foreach ($string as $indice => $str) {
                if ($indice > 0) {
                    $string[$indice] = $str . ']';
                }
            }

            $key = implode('[', $string);
            foreach (array_values($decodeJson) as $es) {
                $errors[$i] = '{"' . $key . '":"' . $es . '"}';
            }
        }

        return json_encode($errors);
    }

}
