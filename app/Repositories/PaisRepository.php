<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 23/09/2017
 * Time: 20:47
 */

namespace App\Repositories;
use App\Models\Pais;
use Illuminate\Support\Facades\Auth;

class PaisRepository extends Repository
{

    public function __construct(Pais $pais,
                                Auth $auth)
    {
        $this->model = $pais;
        $this->auth = $auth;
    }
}