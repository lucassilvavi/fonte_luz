<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/07/18
 * Time: 12:29
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TipoLancamento extends Model
{


    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_tipo_lancamento',
        'ds_tipo_lancamento',
        'st_ativo'
    ];

    public $timestamps = false;
    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_tipo_lancamento";

    /**
     * Campo da chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'co_seq_tipo_lancamento';


}