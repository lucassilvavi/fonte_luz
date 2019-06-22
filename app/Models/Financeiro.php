<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 31/07/18
 * Time: 16:54
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoLancamento;

class Financeiro extends Model
{


    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'co_tipo_lancamento',
        'tipo_lancamento',
        'dt_liquidacao',
        'ano_referencia',
        'mes_referencia',
        'valor',
        'descricao',
        'st_ativo'
    ];

    public $timestamps = false;
    /**
     * Table
     *
     * @var array
     */
    protected $table = "tb_financeiro";

    /**
     * Campo da chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'co_seq_financeiro';

    public function tipoContribuicao()
    {
        return $this->hasMany(TipoLancamento::class,  'co_seq_tipo_lancamento', 'co_tipo_lancamento');
    }
}