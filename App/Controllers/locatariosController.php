<?php
    class locatariosController extends Controller {

        public function index()
        {

            $getHeaders = new locatariosModel();
            $dadosHeader = $getHeaders->getHeaders();
            $dadosModel = $getHeaders->getLocatarios();
            $this->loadTemplate('locatarios', $dadosModel, $dadosHeader);
            
        }

        public function viewLocatarios($idData)
        {

            $getHeaders = new locatariosModel();
            $dadosHeader = $getHeaders->getHeaders();
            $dadosModel = $getHeaders->getDataLocatario($idData);
            $this->loadTemplate('locatario', $dadosModel, $dadosHeader);
            
        }

        public function getUserData()
        {

            if ((isset($_SERVER['REQUEST_METHOD'])) && (($_SERVER['REQUEST_METHOD']) == "POST") && (isset($_SERVER['HTTP_REFERER'])) && (mb_strpos($_SERVER['HTTP_REFERER'], HTTP_PAGE) !== false)):

                extract($_POST);

                if ((isset($IdLocatarios)) && (!is_null($IdLocatarios)) && (!empty($IdLocatarios)) && ctype_digit($IdLocatarios)):

                    $usuario = new locatariosModel();
                    $dados = $usuario->getUserData($IdLocatarios);

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

                if ((isset($IdLocatarios)) && (!is_null($IdLocatarios)) && (!empty($IdLocatarios)) && ctype_digit($IdLocatarios)):

                    if ((isset($EmailLocatarios)) && (!is_null($EmailLocatarios)) && (!empty($EmailLocatarios))):

                        $EmailLocatarios = filter_var($EmailLocatarios, FILTER_SANITIZE_EMAIL);

                        if ((isset($NomeLocatarios)) && (!is_null($NomeLocatarios)) && (!empty($NomeLocatarios))):

                            if ((isset($TelefoneLocatarios)) && (!is_null($TelefoneLocatarios)) && (!empty($TelefoneLocatarios))):

                                $update = new locatariosModel();
                                $dados = $update->updateUserData($IdLocatarios, $NomeLocatarios, $EmailLocatarios, $TelefoneLocatarios);

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

                if ((isset($IdLocatarios)) && (!is_null($IdLocatarios)) && (!empty($IdLocatarios)) && ctype_digit($IdLocatarios)):

                    $update = new locatariosModel();
                    $dados = $update->deleteUserData($IdLocatarios);

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

                if ((isset($EmailLocatarios)) && (!is_null($EmailLocatarios)) && (!empty($EmailLocatarios))):

                    $EmailLocatarios = filter_var($EmailLocatarios, FILTER_SANITIZE_EMAIL);

                    if ((isset($NomeLocatarios)) && (!is_null($NomeLocatarios)) && (!empty($NomeLocatarios))):

                        if ((isset($TelefoneLocatarios)) && (!is_null($TelefoneLocatarios)) && (!empty($TelefoneLocatarios))):

                            $TelefoneLocatarios = preg_replace("/[^0-9]/", "", $TelefoneLocatarios);
                            $add = new locatariosModel();
                            $dados = $add->addUserData($EmailLocatarios, $NomeLocatarios, $TelefoneLocatarios);
        
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

                $dados['mensagem'] = "Erro na requisição.";

            endif;

            echo json_encode($dados);

        }

    }

?>