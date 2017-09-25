<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 23/09/2017
 * Time: 20:46
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{

    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_pais'

    ];

    public $timestamps = false;
    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_pais";
}


