<?php
/**
 * Created by PhpStorm.
 * User: lucas.vieira
 * Date: 02/10/2017
 * Time: 19:11
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RlUsuarioProfissao extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'co_seq_profissao',
        'st_profissao_principal',
        'dt_cadastro',
        'dt_desativacao'

    ];

    /**
     * Table
     *
     * @var array
     */
    public $timestamps = false;

    protected $primaryKey = 'co_seq_usuario_profissao';

    protected $table = "rl_usuario_profissao";

}