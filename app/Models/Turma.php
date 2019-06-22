<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 07/08/18
 * Time: 16:51
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;

class Turma extends Model
{


    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dt_abertura_turma',
        'nu_vagas',
        'st_situacao_turma',
        'dt_fechamento_turma',
        'dt_encerramento_turma',
        'TB_CURSO_co_seq_curso'
    ];

    public $timestamps = false;
    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_turma";

    /**
     * Campo da chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'co_seq_turma';

    public function curso()
    {
        return $this->hasMany(Curso::class,'co_seq_curso',  'TB_CURSO_co_seq_curso');
    }
}