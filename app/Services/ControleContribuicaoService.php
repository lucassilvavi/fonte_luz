<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 11/11/2017
 * Time: 11:40
 */

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ControleContribuicaoRepository;
use App\Repositories\ComprovanteRepository;

class ControleContribuicaoService
{
    private $controleContribuicaoRepository;
    private $comprovanteRepository;

    function __construct(ControleContribuicaoRepository $controleContribuicaoRepository,
                         ComprovanteRepository $comprovanteRepository)
    {
        $this->controleContribuicaoRepository = $controleContribuicaoRepository;
        $this->comprovanteRepository = $comprovanteRepository;
    }

    public function novo($dadosForm)
    {
        DB::beginTransaction();

        try {
            $deAno = $dadosForm['deanoperiodo'];
            $de = $dadosForm['demesperiodo'];
            $ate = $dadosForm['atemesperiodo'];
            $ateAno = $dadosForm['ateanoperiodo'];

            if ($de == $ate && $deAno == $ateAno) {

                $dados['id'] = auth::user()->id;
                $dados['vl_contribuicao_mes'] = $this->trataMoeda($dadosForm['vlcontribuicaoperiodo']);;
                $dados['nu_ano'] = $deAno;
                $dados['nu_mes'] = $de;
                $dados['dt_contribuicao'] =  date('Y-m-d', strtotime($dadosForm['dtdepositoperiodo']));
                $dados['dt_cadastro_registro'] = date("Y-m-d");
                $controle = $this->controleContribuicaoRepository->create($dados);
                foreach ($dadosForm['comprovante'] as $comprovante){
                    $controle->comprovante()->attach($comprovante, ['st_ativo' => 'S']);
                }
            } elseif ($de != $ate && $deAno == $ateAno) {
                for($i = $de; $i <= $ate; $i++) {
                    $dados['id'] = auth::user()->id;
                    $dados['vl_contribuicao_mes'] = $this->trataMoeda($dadosForm['vlcontribuicaoperiodo']);;
                    $dados['nu_ano'] = $deAno;
                    $dados['nu_mes'] = $i;
                    $dados['dt_contribuicao'] =  date('Y-m-d', strtotime($dadosForm['dtdepositoperiodo']));
                    $dados['dt_cadastro_registro'] = date("Y-m-d");
                    $controle = $this->controleContribuicaoRepository->create($dados);
                    foreach ($dadosForm['comprovante'] as $comprovante){
                        $controle->comprovante()->attach($comprovante, ['st_ativo' => 'S']);
                    }
                }
            } elseif ($deAno != $ateAno) {
                echo("mais de 1 mês, e o ano é diferente ");
            }


            DB::commit();
            return '{"operacao":true}';
        } catch (\Illuminate\Database\QueryException $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);
            DB::rollback();
            //Retorna as informacoes do erro.
            return '{"operacao":false}';
        }
    }

    public function trataMoeda($valor)
    {
        $dinheiro = str_replace('.', '', $valor); // remove o ponto
        return str_replace(',', '.', $dinheiro); // troca a vírgula por ponto
    }
}