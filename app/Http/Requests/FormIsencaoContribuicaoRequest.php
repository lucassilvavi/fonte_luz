<?php
    /**
     * Created by PhpStorm.
     * User: lucas.vieira
     * Date: 27/12/2017
     * Time: 10:22
     */

    namespace App\Http\Requests;


    class FormIsencaoContribuicaoRequest extends Request
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
                'deMes' => 'required',
                'deAno' => 'required',
                'membro' => 'required',
                'motivo' => 'required',
            ];
        }
    }