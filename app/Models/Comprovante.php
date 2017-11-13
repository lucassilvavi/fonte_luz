<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 09/11/2017
 * Time: 21:55
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\ControleContribuicao;

class Comprovante  extends Model
{

    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'co_seq_comprovante',
        'ds_endereco_comprovante',
        'dt_anexo',
        'dt_exclusao_anexo',
        'dt_confirmacao_financeiro',
        'ds_observacao_financeiro'
    ];

    public $timestamps = false;
    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_comprovante";


    public function controleFinanceiro()
    {
        return $this->belongsToMany(ControleContribuicao::class, 'rl_compr_controle', 'co_seq_comprovante', 'co_seq_controle_contribuicao');
    }
}


