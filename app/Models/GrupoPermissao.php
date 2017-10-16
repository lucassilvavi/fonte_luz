<?php
/**
 * Created by PhpStorm.
 * User: lucas.vieira
 * Date: 09/10/2017
 * Time: 19:48
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permissoes;
class GrupoPermissao extends Model
{
    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_grupo',
        'ds_grupo',
        'st_ativo'

    ];

    public $timestamps = false;
    /**
     * Table
     *
     * @var array
     */

    protected $table = "tb_grupo_permissoes";
    /**
     * Campo da chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'co_seq_grupo_permissoes';

    public function permissoes(){
        return $this->hasOne(Permissoes::class,'co_seq_grupo_permissoes','co_grupo_permissoes');
    }
}


