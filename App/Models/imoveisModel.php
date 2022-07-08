<?php

    class imoveisModel
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
            $conn->execute([':pagina' => 'imoveis']);
            $dados = $conn->fetch();
            return $dados;

        }
        
        public function getImoveis()
        {

            #acertar query
            $conn = $this->conexao->prepare('SELECT imoveis.IdImoveis, imoveis.Rua, imoveis.Numero, imoveis.complemento, imoveis.cidade, imoveis.uf, imoveis.cep, locatarios.NomeLocatarios,  FROM '.DB_PREFIX.'imoveis');
            $conn->execute();
            $dadosUser = $conn->fetchAll();
            return $dadosUser;
        }

    }

?>