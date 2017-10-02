<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 07/09/2017
 * Time: 16:57
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Perfil extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_perfil',
        'ds_perfil',
        'st_ativo'

    ];

    /**
     * Table
     *
     * @var array
     */
    public $timestamps = false;

    protected $table = "tb_perfil";
}


