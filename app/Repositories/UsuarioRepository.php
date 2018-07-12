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
    public $model;

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
            ->join('tb_cidade', 'tb_usuario.co_cidade', 'tb_cidade.co_seq_cidade')
            ->where('nu_cpf', $cpf)
            ->where('carga', 1)
            ->select('id',
            'nu_cpf',
            'no_nome',
            'dt_nascimento',
            'email',
            'logradouro',
            'bairro',
            'nu_cep',
            'vl_contribuicao',
            'co_uf',
            'co_cidade',
            'naturalidade',
            'co_pais',
            'carga',
            'co_seq_cidade',
            'no_cidade',
            'sg_uf',
            'co_ibge')
            ->get();
    }
}