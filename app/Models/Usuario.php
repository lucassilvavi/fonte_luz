<?php
/**
 * Created by PhpStorm.
 * User: lucas.vieira
 * Date: 04/09/2017
 * Time: 14:52
 */
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nu_cpf',
        'no_nome',
        'dt_nascimento',
        'email',
        'logradouro',
        'bairro',
        'nu_cep',
        'co_uf',
        'co_cidade',
        'vl_contribuicao',
        'password',
        'co_perfil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_usuario";

    public function perfil(){
        return $this->hasOne(Perfil::class,'co_seq_perfil','co_perfil');
    }

    public function profissao()
    {
        return $this->belongsToMany(Profissao::class, 'rl_usuario_profissao', 'id', 'co_seq_profissao');
    }

}


