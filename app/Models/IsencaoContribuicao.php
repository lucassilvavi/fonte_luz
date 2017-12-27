<?php
    /**
     * Created by PhpStorm.
     * User: lucas.vieira
     * Date: 27/12/2017
     * Time: 10:54
     */

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class IsencaoContribuicao extends Model
    {

        protected $connection = 'mysql';
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'dt_inicio_vigencia',
            'dt_fim_vigencia',
            'ds_observacao',
            'id_usuario'

        ];

        public $timestamps = false;
        /**
         * Table
         *
         * @var array
         */
        protected $table = "tb_isencao_contribuicao";

        protected $primaryKey = 'co_seq_isencao_contribuicao';

        public function usuario()
        {
            return $this->hasOne(Usuario::class, 'id', 'id_usuario');
        }
    }

