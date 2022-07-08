<?php

    class homeModel
    {

        private $conexao;

        public function __construct()
        {

            $this->conexao = Conexao::conectaDB();

        }

        public function getHeaders()
        {

            $dados = array();
            $conn = $this->conexao->prepare('SELECT title, description, canonical, keywords, card, alt, css, js FROM '.DB_PREFIX.'paginas WHERE nome = :pagina');
            $conn->execute([':pagina' => 'home']);
            $dados = $conn->fetch();
            return $dados;

        }

    }