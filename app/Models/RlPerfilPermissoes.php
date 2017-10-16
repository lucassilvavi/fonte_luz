<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 12/10/2017
 * Time: 13:01
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class RlPerfilPermissoes extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dt_cadastro',
        'dt_exclusao',
        'co_permissoes',
        'co_perfil'


    ];

    /**
     * Table
     *
     * @var array
     */
    public $timestamps = false;

    protected $primaryKey = 'co_seq_perfil_permissoes';

    protected $table = "rl_perfil_permissoes";

}