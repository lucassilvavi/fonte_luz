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
        'nome_usuario',
        'dt_nascimento',
        'email',
        'logradouro',
        'bairro',
        'nu_cep',
        'co_uf',
        'co_cidade',
        'remember_token',
        'password'
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
     * PrimaryKey
     *
     * @var array
     */
    protected $primaryKey = 'co_seq_usuario';
    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_usuario";
}