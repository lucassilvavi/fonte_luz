<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 23/09/2017
 * Time: 20:13
 */

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;
use App\Models\Profissao;

class ProfissaoRepository extends Repository
{

    public function __construct(Profissao $profissao,
                                Auth $auth)
    {
        $this->model = $profissao;
        $this->auth = $auth;
    }

    public function getAtiva()
    {
        return $this->model->where('st_ativo', 'S')->get();
    }
}