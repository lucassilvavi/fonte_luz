<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 07/08/18
 * Time: 18:50
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TurmaUsuario extends Model
{

    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dt_vinculacao_turma',
        'dt_desvinculacao_turma',
        'st_ativo',
        'id_usuario_desvinculacao',
        'ds_desvinculacao_turma',
        'id_usuario_vinculador',
        'TB_TURMA_co_seq_turma',
        'TB_USUARIO_id'
    ];

    public $timestamps = false;
    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_turma_usuario";

    /**
     * Campo da chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'co_seq_financeiro';


}