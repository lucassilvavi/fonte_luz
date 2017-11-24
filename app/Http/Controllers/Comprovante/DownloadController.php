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

        function comprovantes($co_seq_comprovante)
        {
            $anexo = $this->comprovanteRepository->findBy('co_seq_comprovante', $co_seq_comprovante)->ds_endereco_comprovante;
            $this->download($anexo);
        }

        public function download($file)
        {
            $arquivo = $file;

            if (isset($arquivo) && file_exists($arquivo)) {
                switch (strtolower(substr(strrchr(basename($arquivo), "."), 1))) {
                    case "png":
                        $tipo = "image/png";
                        break;
                    case "jpe":
                        $tipo = "image/jpeg";
                        break;
                    case "jpeg":
                        $tipo = "image/jpeg";
                        break;
                    case "jpg":
                        $tipo = "image/jpeg";
                        break;
                }

                header("Content-Type: " . $tipo); // informa o tipo do arquivo ao navegador
                header("Content-Length: " . filesize($arquivo)); // informa o tamanho do arquivo ao navegador
                header("Content-Disposition: attachment; filename=" . basename($arquivo)); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
                readfile($arquivo); // lê o arquivo
                exit; // aborta pós-ações
            }
        }
    }