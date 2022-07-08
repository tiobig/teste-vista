<?php

    class usuariosModel
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
            $conn->execute([':pagina' => 'usuarios']);
            $dados = $conn->fetch();
            return $dados;

        }
        
        public function getUsuarios()
        {

            $conn = $this->conexao->prepare('SELECT idUser, NomeUser, EmailUser, TelefoneUser FROM '.DB_PREFIX.'users');
            $conn->execute();
            $dadosUser = $conn->fetchAll();
            return $dadosUser;
        }

        public function getUserData($id)
        {

            $conn = $this->conexao->prepare('SELECT NomeUser, EmailUser, TelefoneUser FROM '.DB_PREFIX.'users WHERE IdUser = ?');
            $conn->bindParam(1, $id);
            $conn->execute();
            $linhas = $conn->rowCount();
            if ($linhas == 1):
                $dados = $conn->fetch();
                $dados['mensagem'] = 'OK';
            elseif ($linhas == 0):
                $dados['mensagem'] = 'Usuário não encontrado!';
            else:
                $dados['mensagem'] = 'Erro na requisição. Entre em contato com o administrador.';
            endif;
            return $dados;
            
        }

        public function updateUserData($id, $nome, $email, $telefone)
        {

            $conn = $this->conexao->prepare('UPDATE '.DB_PREFIX.'users SET NomeUser = ?, EmailUser = ?, TelefoneUser = ? WHERE IdUser = ?');
            $conn->bindParam(1, $nome);
            $conn->bindParam(2, $email);
            $conn->bindParam(3, $telefone);
            $conn->bindParam(4, $id);
            $conn->execute();
            $linhas = $conn->rowCount();
            if ($linhas == 1):
                $dados['mensagem'] = 'OK';
            elseif ($linhas < 1):
                $dados['mensagem'] = 'Nenhuma alteração foi realizada';
            else:
                $dados['mensagem'] = 'Erro grave no sistema. Contate o administrador.';
            endif;
            return $dados;

        }

        public function deleteUserData($id)
        {

            $conn = $this->conexao->prepare('DELETE FROM '.DB_PREFIX.'users WHERE IdUser = ?');
            $conn->bindParam(1, $id);
            $conn->execute();
            $linhas = $conn->rowCount();
            if ($linhas == 1):
                $dados['mensagem'] = 'OK';
            elseif ($linhas < 1):
                $dados['mensagem'] = 'Nenhuma alteração foi realizada';
            else:
                $dados['mensagem'] = 'Erro grave no sistema. Contate o administrador.';
            endif;
            return $dados;

        }

        public function addUserData($EmailUser, $NomeUser, $TelefoneUser, $SenhaUser)
        {

            $conn = $this->conexao->prepare('SELECT IdUser FROM '.DB_PREFIX.'users WHERE EmailUser = ?');
            $conn->bindParam(1, $EmailUser);
            $conn->execute();
            $cadastros = $conn->rowCount();
            if ($cadastros == 0):
                $conn = $this->conexao->prepare('INSERT INTO '.DB_PREFIX.'users (EmailUser, NomeUser, TelefoneUser, SenhaUser) VALUES (?, ?, ?, ?)');
                $conn->bindParam(1, $EmailUser);
                $conn->bindParam(2, $NomeUser);
                $conn->bindParam(3, $TelefoneUser);
                $conn->bindParam(4, $SenhaUser);
                $conn->execute();
                $linhas = $conn->rowCount();
                if ($linhas == 1):
                    $temp = $this->conexao->query('SELECT IdUser FROM '.DB_PREFIX.'users WHERE IdUser = LAST_INSERT_ID()')->fetch();
                    extract($temp);
                    $dados['mensagem'] = 'OK';
                    $dados['IdUser'] = $IdUser;
                elseif ($linhas < 1):
                    $dados['mensagem'] = 'Nenhuma alteração foi realizada';
                else:
                    $dados['mensagem'] = 'Erro grave no sistema. Contate o administrador.';
                endif;
            else:
                $dados['mensagem'] = 'E-mail já cadastrado';
            endif;
            return $dados;

        }

    }