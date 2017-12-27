<?php
    /**
     * Created by PhpStorm.
     * User: lucas.vieira
     * Date: 27/12/2017
     * Time: 10:58
     */

    namespace App\Repositories;

    use App\Models\IsencaoContribuicao;

    class IsencaoContribuicaoRepository extends Repository
    {
        private $isencaoContribuicao;

        public function __construct(IsencaoContribuicao $isencaoContribuicao)
        {
            $this->model = $isencaoContribuicao;
        }

    }