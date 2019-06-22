<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 22/09/2017
 * Time: 20:38
 */

namespace App\Repositories;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;


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
            ->join('tb_cidade', 'tb_usuario.co_cidade',
                'tb_cidade.co_seq_cidade')
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

    public function getUsuarioSemTurma($co_seq_turma)
    {

        return DB::select("select *
                from tb_usuario t1
                where not exists(select *
                 from tb_turma_usuario t2
                  where TB_TURMA_co_seq_turma = $co_seq_turma
                   and st_ativo = 'S'
                   and dt_desvinculacao_turma is null
                   and t1.id = t2.TB_USUARIO_id)");
    }

    public function getDadosImportantes($id)
    {
        return $this->model
            ->leftJoin('tb_telefone', 'tb_usuario.id', 'tb_telefone.id')
            ->where('tb_usuario.id', $id)
            ->select('tb_usuario.id',
                'tb_usuario.no_nome',
                'tb_usuario.email',
                'tb_usuario.dt_nascimento',
                'tb_telefone.nu_telefone')
            ->get();
    }

}