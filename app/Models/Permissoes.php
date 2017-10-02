<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 30/09/2017
 * Time: 17:34
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Permissoes extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_permissao',
        'ds_permissao',
        'co_grupo_permissoes'

    ];

    /**
     * Table
     *
     * @var array
     */
    public $timestamps = false;

    protected $table = "tb_permissoes";
}


