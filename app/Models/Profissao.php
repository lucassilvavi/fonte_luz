<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 23/09/2017
 * Time: 20:12
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Profissao extends Model
{

    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_profissao',
        'st_ativo',
        'dt_desativacao'
    ];

    public $timestamps = false;
    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_profissao";
}


