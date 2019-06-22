<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 06/08/18
 * Time: 18:29
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{


    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_curso',
        'ds_ementa_curso',
        'dt_cadastro_curso',
        'dt_exclusao_curso',
        'st_ativo'
    ];

    public $timestamps = false;
    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_curso";

    /**
     * Campo da chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'co_seq_curso';

}