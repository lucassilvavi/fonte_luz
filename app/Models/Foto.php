<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 11/09/2017
 * Time: 17:10
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ds_endereco_foto',
        'dt_cadastro_foto',
        'st_ativo',
        'dt_desativacao',
        'co_usuario',
        'no_foto'
    ];

    public $timestamps = false;
    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_foto";
}


