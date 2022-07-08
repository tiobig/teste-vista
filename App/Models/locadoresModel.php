<?php

    class locadoresModel
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
            $conn->execute([':pagina' => 'locadores']);
            $dados = $conn->fetch();
            return $dados;

        }
        
        public function getLocadores()
        {

            $conn = $this->conexao->prepare('SELECT IdLocadores, NomeLocadores, EmailLocadores, TelefoneLocadores FROM '.DB_PREFIX.'locadores');
            $conn->execute();
            $dadosUser = $conn->fetchAll();
            return $dadosUser;
        }

        public function getUserData($id)
        {

            $conn = $this->conexao->prepare('SELECT NomeLocadores, EmailLocadores, TelefoneLocadores FROM '.DB_PREFIX.'locadores WHERE IdLocadores = ?');
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

            $conn = $this->conexao->prepare('UPDATE '.DB_PREFIX.'locadores SET NomeLocadores = ?, EmailLocadores = ?, TelefoneLocadores = ? WHERE IdLocadores = ?');
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

            $conn = $this->conexao->prepare('DELETE '.DB_PREFIX.'locadores, '.DB_PREFIX.'imoveis FROM '.DB_PREFIX.'locadores INNER JOIN '.DB_PREFIX.'imoveis ON '.DB_PREFIX.'locadores.IdLocadores = '.DB_PREFIX.'imoveis.IdLocadores WHERE '.DB_PREFIX.'locadores.IdLocadores = ?');
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

        public function addUserData($EmailLocadores, $NomeLocadores, $TelefoneLocadores)
        {

            $conn = $this->conexao->prepare('SELECT IdLocadores FROM '.DB_PREFIX.'locadores WHERE EmailLocadores = ?');
            $conn->bindParam(1, $EmailLocadores);
            $conn->execute();
            $cadastros = $conn->rowCount();
            if ($cadastros == 0):
                $conn = $this->conexao->prepare('INSERT INTO '.DB_PREFIX.'locadores (EmailLocadores, NomeLocadores, TelefoneLocadores) VALUES (?, ?, ?)');
                $conn->bindParam(1, $EmailLocadores);
                $conn->bindParam(2, $NomeLocadores);
                $conn->bindParam(3, $TelefoneLocadores);
                $conn->execute();
                $linhas = $conn->rowCount();
                if ($linhas == 1):
                    $temp = $this->conexao->query('SELECT IdLocadores FROM '.DB_PREFIX.'locadores WHERE IdLocadores = LAST_INSERT_ID()')->fetch();
                    extract($temp);
                    $dados['mensagem'] = 'OK';
                    $dados['IdLocadores'] = $IdLocadores;
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

        public function getDataLocador($idData)
        {
            $conn = $this->conexao->prepare('SELECT IdImoveis, Rua, Numero, complemento, cidade, uf, cep FROM '.DB_PREFIX.'imoveis WHERE IdLocadores = ?');
            $conn->bindParam(1, $idData);
            $conn->execute();
            $dados['listaImoveis'] = $conn->fetchAll();
            $conn = $this->conexao->prepare('SELECT NomeLocadores, EmailLocadores, TelefoneLocadores FROM '.DB_PREFIX.'locadores WHERE IdLocadores = ?');
            $conn->bindParam(1, $idData);
            $conn->execute();
            $linhas = $conn->rowCount();
            $dados['dadosLocador'] = $conn->fetch();
            return $dados;
        }
    }

?>