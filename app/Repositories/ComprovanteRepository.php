<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 09/11/2017
 * Time: 22:14
 */

namespace App\Repositories;
use App\Repositories\Repository;
use App\Models\Comprovante;
use Illuminate\Support\Facades\DB;

class ComprovanteRepository extends Repository
{

    public function __construct(Comprovante $comprovante)
    {
        $this->model = $comprovante;

    }
    function apagarComprovante($co_comprovante){
        DB::select("DELETE FROM `tb_comprovante` WHERE co_seq_comprovante = $co_comprovante");
    }

}