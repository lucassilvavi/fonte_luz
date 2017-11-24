<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 23/11/2017
 * Time: 22:13
 */

namespace App\Http\Controllers\Comprovante;


use App\Http\Controllers\Controller;

use App\Repositories\ComprovanteRepository;
class DownloadController extends Controller
{
private $comprovanteRepository;
function __construct(ComprovanteRepository $comprovanteRepository)
{
    $this->comprovanteRepository = $comprovanteRepository;
}

    function comprovantes($co_seq_comprovante){
        $documento = $this->comprovanteRepository->findBy('co_seq_comprovante', $co_seq_comprovante);
        // Define o tempo máximo de execução em 0 para as conexões lentas
        set_time_limit(0);
        // Arqui você faz as validações e/ou pega os dados do banco de dados
        $partes = explode("/", $documento->ds_endereco_comprovante);
        $aquivoNome = $partes[2]; // nome do arquivo que será enviado p/ download

        $arquivoLocal = $documento->ds_endereco_comprovante; // caminho absoluto do arquivo
        // Verifica se o arquivo não existe
        if (!file_exists($arquivoLocal)) {
            // Exiba uma mensagem de erro caso ele não exista
            exit;
        }
        // Aqui você pode aumentar o contador de downloads
        // Definimos o novo nome do arquivo
        $novoNome = 'efef';
        // Configuramos os headers que serão enviados para o browser
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename="'.$novoNome.'"');
        header('Content-Type: application/octet-stream');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($aquivoNome));
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Expires: 0');
        // Envia o arquivo para o cliente
        readfile($aquivoNome);
    }
}