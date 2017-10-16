<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 07/09/2017
 * Time: 16:57
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
    protected $primaryKey = 'co_seq_perfil';

    public function permissoes()
    {
        return $this->belongsToMany(Permissoes::class, 'rl_perfil_permissoes', 'co_seq_perfil', 'co_seq_permissoes');
    }
    public function permissoesAtivas()
    {
        return $this->belongsToMany(Permissoes::class, 'rl_perfil_permissoes', 'co_seq_perfil', 'co_seq_permissoes')
            ->where('dt_exclusao',null)
            ->where('co_seq_perfil',auth::user());
    }
}


