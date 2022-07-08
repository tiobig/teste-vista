<?php
    class usuariosController extends Controller {

        public function index()
        {

            $getHeaders = new usuariosModel();
            $dadosHeader = $getHeaders->getHeaders();
            $dadosModel = $getHeaders->getUsuarios();
            $this->loadTemplate('usuarios', $dadosModel, $dadosHeader);
            
        }

        public function getUserData()
        {

            if ((isset($_SERVER['REQUEST_METHOD'])) && (($_SERVER['REQUEST_METHOD']) == "POST") && (isset($_SERVER['HTTP_REFERER'])) && (mb_strpos($_SERVER['HTTP_REFERER'], HTTP_PAGE) !== false)):

                extract($_POST);

                if ((isset($idUsuario)) && (!is_null($idUsuario)) && (!empty($idUsuario)) && ctype_digit($idUsuario)):

                    $usuario = new usuariosModel();
                    $dados = $usuario->getUserData($idUsuario);

                else:

                    $dados['mensagem'] = "Erro no envio dos dados";

                endif;

            else:

                $dados['mensagem'] = "Erro na solicitação";

            endif;

            echo json_encode($dados);

        }

        public function updateUserData()
        {

            if ((isset($_SERVER['REQUEST_METHOD'])) && (($_SERVER['REQUEST_METHOD']) == "POST") && (isset($_SERVER['HTTP_REFERER'])) && (mb_strpos($_SERVER['HTTP_REFERER'], HTTP_PAGE) !== false)):

                extract($_POST);

                if ((isset($idUsuario)) && (!is_null($idUsuario)) && (!empty($idUsuario)) && ctype_digit($idUsuario)):

                    if ((isset($EmailUser)) && (!is_null($EmailUser)) && (!empty($EmailUser))):

                        $EmailUser = filter_var($EmailUser, FILTER_SANITIZE_EMAIL);

                        if ((isset($NomeUser)) && (!is_null($NomeUser)) && (!empty($NomeUser))):

                            if ((isset($TelefoneUser)) && (!is_null($TelefoneUser)) && (!empty($TelefoneUser))):

                                $update = new usuariosModel();
                                $dados = $update->updateUserData($idUsuario, $NomeUser, $EmailUser, $TelefoneUser);

                            else:

                                $dados['mensagem'] = "O campo Telefone não pode estar vazio";

                            endif;

                        else:

                            $dados['mensagem'] = "O campo Nome não pode estar vazio";

                        endif;

                    else:

                        $dados['mensagem'] = "O campo E-mail não pode estar vazio";

                    endif;

                else:

                    $dados['mensagem'] = "Usuário não encontrado. Entre em contato com o administrador.";

                endif;

            else:

                $dados['mensagem'] = "Erro na requisição.";

            endif;

            echo json_encode($dados);

        }

        public function deleteUserData()
        {

            if ((isset($_SERVER['REQUEST_METHOD'])) && (($_SERVER['REQUEST_METHOD']) == "POST") && (isset($_SERVER['HTTP_REFERER'])) && (mb_strpos($_SERVER['HTTP_REFERER'], HTTP_PAGE) !== false)):

                extract($_POST);

                if ((isset($idUsuario)) && (!is_null($idUsuario)) && (!empty($idUsuario)) && ctype_digit($idUsuario)):

                    $update = new usuariosModel();
                    $dados = $update->deleteUserData($idUsuario);

                else:

                    $dados['mensagem'] = "Usuário não encontrado. Entre em contato com o administrador.";

                endif;

            else:

                $dados['mensagem'] = "Erro na requisição.";

            endif;

            echo json_encode($dados);

        }

        public function addUserData()
        {

            if ((isset($_SERVER['REQUEST_METHOD'])) && (($_SERVER['REQUEST_METHOD']) == "POST") && (isset($_SERVER['HTTP_REFERER'])) && (mb_strpos($_SERVER['HTTP_REFERER'], HTTP_PAGE) !== false)):

                extract($_POST);

                if ((isset($SenhaUser)) && (!is_null($SenhaUser)) && (!empty($SenhaUser))):

                    $SenhaUser = md5(crypt($SenhaUser, SALTO));

                    if ((isset($EmailUser)) && (!is_null($EmailUser)) && (!empty($EmailUser))):

                        $EmailUser = filter_var($EmailUser, FILTER_SANITIZE_EMAIL);

                        if ((isset($NomeUser)) && (!is_null($NomeUser)) && (!empty($NomeUser))):

                            if ((isset($TelefoneUser)) && (!is_null($TelefoneUser)) && (!empty($TelefoneUser))):

                                $TelefoneUser = preg_replace("/[^0-9]/", "", $TelefoneUser);
                                $add = new usuariosModel();
                                $dados = $add->addUserData($EmailUser, $NomeUser, $TelefoneUser, $SenhaUser);
            
                            else:

                                $dados['mensagem'] = "O campo Telefone não pode estar vazio";

                            endif;

                        else:

                            $dados['mensagem'] = "O campo Nome não pode estar vazio";

                        endif;

                    else:

                        $dados['mensagem'] = "O campo E-mail não pode estar vazio";

                    endif;

                else:

                    $dados['mensagem'] = "O campo senha não pode estar vazio";

                endif;

            else:

                $dados['mensagem'] = "Erro na requisição.";

            endif;

            echo json_encode($dados);

        }

    }
?>