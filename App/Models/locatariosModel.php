<?php

    class locatariosModel
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
            $conn->execute([':pagina' => 'locatarios']);
            $dados = $conn->fetch();
            return $dados;

        }
        
        public function getLocatarios()
        {

            $conn = $this->conexao->prepare('SELECT IdLocatarios, NomeLocatarios, EmailLocatarios, TelefoneLocatarios FROM '.DB_PREFIX.'locatarios');
            $conn->execute();
            $dadosUser = $conn->fetchAll();
            return $dadosUser;
        }

        public function getUserData($id)
        {

            $conn = $this->conexao->prepare('SELECT NomeLocatarios, EmailLocatarios, TelefoneLocatarios FROM '.DB_PREFIX.'locatarios WHERE IdLocatarios = ?');
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

            $conn = $this->conexao->prepare('UPDATE '.DB_PREFIX.'locatarios SET NomeLocatarios = ?, EmailLocatarios = ?, TelefoneLocatarios = ? WHERE IdLocatarios = ?');
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

            $conn = $this->conexao->prepare('DELETE '.DB_PREFIX.'locatarios, '.DB_PREFIX.'imoveis FROM '.DB_PREFIX.'locatarios INNER JOIN '.DB_PREFIX.'imoveis ON '.DB_PREFIX.'locatarios.IdLocatarios = '.DB_PREFIX.'imoveis.IdLocatarios WHERE '.DB_PREFIX.'locatarios.IdLocatarios = ?');
            $conn->bindParam(1, $id);
            $conn->execute();
            $linhas = $conn->rowCount();
            if ($linhas > 0):
                $dados['mensagem'] = 'OK';
            else:
                $dados['mensagem'] = 'Nenhuma alteração foi realizada';
            endif;
            return $dados;

        }

        public function addUserData($EmailLocatarios, $NomeLocatarios, $TelefoneLocatarios)
        {

            $conn = $this->conexao->prepare('SELECT IdLocatarios FROM '.DB_PREFIX.'locatarios WHERE EmailLocatarios = ?');
            $conn->bindParam(1, $EmailLocatarios);
            $conn->execute();
            $cadastros = $conn->rowCount();
            if ($cadastros == 0):
                $conn = $this->conexao->prepare('INSERT INTO '.DB_PREFIX.'locatarios (EmailLocatarios, NomeLocatarios, TelefoneLocatarios) VALUES (?, ?, ?)');
                $conn->bindParam(1, $EmailLocatarios);
                $conn->bindParam(2, $NomeLocatarios);
                $conn->bindParam(3, $TelefoneLocatarios);
                $conn->execute();
                $linhas = $conn->rowCount();
                if ($linhas == 1):
                    $temp = $this->conexao->query('SELECT IdLocatarios FROM '.DB_PREFIX.'locatarios WHERE IdLocatarios = LAST_INSERT_ID()')->fetch();
                    extract($temp);
                    $dados['mensagem'] = 'OK';
                    $dados['IdLocatarios'] = $IdLocatarios;
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

        public function getDataLocatario($idData)
        {
            $conn = $this->conexao->prepare('SELECT IdImoveis, Rua, Numero, complemento, cidade, uf, cep FROM '.DB_PREFIX.'imoveis WHERE IdLocatarios = ?');
            $conn->bindParam(1, $idData);
            $conn->execute();
            $dados['listaImoveis'] = $conn->fetchAll();
            $conn = $this->conexao->prepare('SELECT NomeLocatarios, EmailLocatarios, TelefoneLocatarios FROM '.DB_PREFIX.'locatarios WHERE IdLocatarios = ?');
            $conn->bindParam(1, $idData);
            $conn->execute();
            $linhas = $conn->rowCount();
            $dados['dadosLocatario'] = $conn->fetch();
            return $dados;
        }
    }

?>