<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 22/09/2017
 * Time: 20:38
 */

namespace App\Repositories;

use App\Models\Usuario;
use App\Repositories\Repository;

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
}