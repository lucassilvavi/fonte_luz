<?php
    /**
     * Created by PhpStorm.
     * User: lucas
     * Date: 22/09/2017
     * Time: 20:38
     */

    namespace App\Repositories;

    use App\Models\Usuario;


    class UsuarioRepository extends Repository
    {

        public function __construct(Usuario $usuario)
        {
            $this->model = $usuario;
        }

        function getUsuarioMenosProprio($id)
        {
            return $this->model->where('id', '!=', $id)->get();
        }

        function getUsuarioDaCarga($cpf)
        {
            return $this->model
                ->where('nu_cpf', $cpf)
                ->where('carga', 1)
                ->get();
        }
    }