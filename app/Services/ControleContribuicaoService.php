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

    public function novoPorPeriodo($dadosForm)
    {
        DB::beginTransaction();

        try {
            $deAno = $dadosForm['deanoperiodo'];
            $de = $dadosForm['demesperiodo'];
            $ate = $dadosForm['atemesperiodo'];
            $ateAno = $dadosForm['ateanoperiodo'];
            if ($de == $ate && $deAno == $ateAno) {
                $this->pagamento($deAno, $de, $dadosForm['vlcontribuicaoperiodo'], $dadosForm['dtdepositoperiodo'], $dadosForm['comprovante']);
            } elseif ($de != $ate && $deAno == $ateAno) {
                for ($i = $de; $i <= $ate; $i++) {
                    $this->pagamento($deAno, $i, $dadosForm['vlcontribuicaoperiodo'], $dadosForm['dtdepositoperiodo'], $dadosForm['comprovante']);
                }

            } elseif ($deAno != $ateAno) {
                if ($deAno > $ateAno) {
                    return '{"erroAno":true}';
                }
                for ($i = $de; $i <= 12; $i++) {
                    $this->pagamento($deAno, $i, $dadosForm['vlcontribuicaoperiodo'], $dadosForm['dtdepositoperiodo'], $dadosForm['comprovante']);
                }
                for ($s = 1; $s <= $ate; $s++) {
                    $this->pagamento($deAno, $s, $dadosForm['vlcontribuicaoperiodo'], $dadosForm['dtdepositoperiodo'], $dadosForm['comprovante']);
                }
            }

            DB::commit();
            return '{"operacao":true}';
        } catch
        (\Illuminate\Database\QueryException $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);
            DB::rollback();
            //Retorna as informacoes do erro.
            return '{"operacao":false}';
        }
    }

    function novoPorMes($dadosForm)
    {
        DB::beginTransaction();

        try {
            $deAno = $dadosForm['anoMes'];
            $de = $dadosForm['demes'];
            $this->pagamento($deAno, $de, $dadosForm['vlcontribuicaomes'], $dadosForm['dtdepositomes'], $dadosForm['comprovante']);
            DB::commit();
            return '{"operacao":true}';
        } catch
        (\Illuminate\Database\QueryException $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);
            DB::rollback();
            //Retorna as informacoes do erro.
            return '{"operacao":false}';
        }
    }

    function pagamento($ano, $mes, $valorContribuicaoPeriodo, $dtdepositoperiodo, $comprovantes)
    {
        DB::beginTransaction();

        try {
            $dados['id'] = auth::user()->id;
            $dados['vl_contribuicao_mes'] = $this->trataMoeda($valorContribuicaoPeriodo);
            $dados['nu_ano'] = $ano;
            $dados['nu_mes'] = $mes;
            $dados['dt_contribuicao'] = date('Y-m-d', strtotime($dtdepositoperiodo));
            $dados['dt_cadastro_registro'] = date("Y-m-d");
            $controle = $this->controleContribuicaoRepository->create($dados);
            foreach ($comprovantes as $comprovante) {
                $controle->comprovante()->attach($comprovante, ['st_ativo' => 'S']);
            }
            DB::commit();
            return '{"operacao":true}';
        } catch
        (\Illuminate\Database\QueryException $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);
            DB::rollback();
            //Retorna as informacoes do erro.
            return '{"operacao":false}';
        }
    }

    public function editar($dadosForm)
    {

        DB::beginTransaction();

        try {

            $dados['nu_ano'] = $dadosForm['anoMes'];
            $dados['nu_mes'] = $dadosForm['demes'];
            $dados['dt_contribuicao'] = date('Y-m-d', strtotime($dadosForm['dtdepositomes']));
            $dados['vl_contribuicao_mes'] = $this->trataMoeda($dadosForm['vlcontribuicaomes']);
            $this->controleContribuicaoRepository->update($dados, $dadosForm['co_seq_controle_contribuicao'], 'co_seq_controle_contribuicao');

            DB::commit();
            return '{"operacao":true}';
        } catch
        (\Illuminate\Database\QueryException $e) {

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