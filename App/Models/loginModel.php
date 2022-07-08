<?php

    class loginModel
    {

        private $conexao;

        public function __construct()
        {

            $this->conexao = Conexao::conectaDB();

        }

        public function login($email, $senha)
        {

            $conn = $this->conexao->prepare('SELECT idUser, NomeUser, TelefoneUser FROM '.DB_PREFIX.'users WHERE EmailUser = ? AND SenhaUser = ?');
            $conn->bindParam(1, $email);
            $conn->bindParam(2, $senha);
            $conn->execute();
            $linhas = $conn->rowCount();
            
            if ($linhas < 1):
                $dadosUser = ['mensagem' => 'Usuário/Senha não correspondem. Verifique os dados inseridos.'];
            elseif ($linhas > 1):
                $dadosUser = ['mensagem' => 'Erro Fatal no acesso ao sistema. Entre em contato com o administrador e informe o Código 001.'];
            else:
                $dadosUser = $conn->fetch();
                $dadosUser['mensagem'] = 'OK';
            endif;

            return $dadosUser;
        }

    }