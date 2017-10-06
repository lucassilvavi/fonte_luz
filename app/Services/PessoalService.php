<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 22/09/2017
 * Time: 20:41
 */

namespace App\Services;

use App\Repositories\UsuarioRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\UnidadeFederativaRepository;
use App\Services\ProfissoesService;

class PessoalService
{
    private $usuarioRepository;
    private $unidadeFederativaRepository;
    private $profissoesService;

    public function __construct(UsuarioRepository $usuarioRepository,
                                UnidadeFederativaRepository $unidadeFederativaRepository,
                                ProfissoesService $profissoesService)
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->unidadeFederativaRepository = $unidadeFederativaRepository;
        $this->profissoesService = $profissoesService;
    }

    public function editar($dadosForm)
    {
        DB::beginTransaction();

        try {
            $dados['no_nome'] = $dadosForm['no_nome'];
            $dados['email'] = $dadosForm['email'];
            $dados['co_uf'] = $this->unidadeFederativaRepository->getCoUnidade($dadosForm['uf']);
            $dados['co_cidade'] = $dadosForm['cidade'];
            $dados['logradouro'] = $dadosForm['logradouro'];
            $dados['bairro'] = $dadosForm['bairro'];
            $dados['nu_cep'] = $dadosForm['cep'];
            $dados['naturalidade'] = $dadosForm['naturalidade'];
            $dados['co_pais'] = $dadosForm['nacionalidade'];
            $dados['vl_contribuicao'] = $this->trataMoeda($dadosForm['valor']);
            $oi=$this->profissoesService->salvarTrabalho($dadosForm['profissao']);
            dd($oi);
            $this->usuarioRepository->update($dados, auth::user()->id, 'id');
            DB::commit();
            return '{"operacao":true}';
        } catch (\Illuminate\Database\QueryException $e) {

            $exception = $e->getMessage() . $e->getTraceAsString();
            Log::error($exception);

            DB::rollback();
            //Retorna as informacoes do erro.

            return '{"operacao":false}';
        } catch (\Yajra\Pdo\Oci8\Exceptions\Oci8Exception $e) {

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