<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 11/09/2017
 * Time: 17:10
 */

namespace App\Models;


class Foto
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ds_endereco_foto',
        'dt_cadastro_foto',
        'st_ativo',
        'dt_desativacao'

    ];

    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_foto";
}


