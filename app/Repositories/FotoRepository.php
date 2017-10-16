<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 11/09/2017
 * Time: 17:13
 */

namespace App\Repositories;

use App\Models\Foto;
use Illuminate\Support\Facades\Auth;

class FotoRepository extends Repository
{


    public function __construct(Foto $foto,
                                Auth $auth)
    {
        $this->model = $foto;
        $this->auth = $auth;
    }

    public function getAtiva($usuario)
    {
        return $this->model->where('st_ativo', 'S')
            ->where('id',$usuario)->get();
    }
    public function getAtivaWithUser()
    {
        return $this->model->where('st_ativo', 'S')
            ->where('id',auth::user()->id)->get();
    }
    public function getFotos($id_usuarioByAdm = null)
    {
        if (!empty($id_usuarioByAdm)){
            return $this->model->where('dt_desativacao', null)
                ->where('id',$id_usuarioByAdm)->get();
        }
        return $this->model->where('dt_desativacao', null)
            ->where('id',auth::user()->id)->get();
    }
    public function getExistentes($id_usuarioByAdm)
    {
        return $this->model
            ->where('id',$id_usuarioByAdm)->get();
    }

}