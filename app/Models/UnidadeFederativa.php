<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 23/09/2017
 * Time: 21:02
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UnidadeFederativa extends Model
{

    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_uf',
        'sg_uf'
    ];

    public $timestamps = false;
    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_unidade_federativa";
}


