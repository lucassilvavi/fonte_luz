<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 08/10/2017
 * Time: 12:23
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{


    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nu_telefone',
        'tp_telefone',
        'st_ativo',
        'id',
        'co_entidade'
    ];

    public $timestamps = false;
    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_telefone";

    /**
     * Campo da chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'co_seq_telefone';
}


