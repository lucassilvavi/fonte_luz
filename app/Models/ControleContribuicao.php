<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 09/11/2017
 * Time: 21:58
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comprovante;

class ControleContribuicao extends Model
{


    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'vl_contribuicao_mes',
        'nu_ano',
        'nu_mes',
        'dt_contribuicao',
        'dt_cadastro_registro',
        'dt_exclusao_registro',
        'dt_confirmacao_financeiro',
        'ds_observacao_financeiro'

    ];

    public $timestamps = false;
    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_controle_contribuicao";

    protected $primaryKey = 'co_seq_controle_contribuicao';

    public function comprovante()
    {
        return $this->belongsToMany(Comprovante::class, 'rl_compr_controle', 'co_seq_controle_contribuicao', 'co_seq_comprovante');
    }
}


