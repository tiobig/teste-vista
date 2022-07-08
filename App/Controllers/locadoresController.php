<?php
    class locadoresController extends Controller {

        public function index()
        {

            $getHeaders = new locadoresModel();
            $dadosHeader = $getHeaders->getHeaders();
            $dadosModel = $getHeaders->getLocadores();
            $this->loadTemplate('locadores', $dadosModel, $dadosHeader);
            
        }

        public function viewLocadores($idData)
        {

            $getHeaders = new locadoresModel();
            $dadosHeader = $getHeaders->getHeaders();
            $dadosModel = $getHeaders->getDataLocador($idData);
            $this->loadTemplate('locador', $dadosModel, $dadosHeader);
            
        }

        public function getUserData()
        {

            if ((isset($_SERVER['REQUEST_METHOD'])) && (($_SERVER['REQUEST_METHOD']) == "POST") && (isset($_SERVER['HTTP_REFERER'])) && (mb_strpos($_SERVER['HTTP_REFERER'], HTTP_PAGE) !== false)):

                extract($_POST);

                if ((isset($IdLocadores)) && (!is_null($IdLocadores)) && (!empty($IdLocadores)) && ctype_digit($IdLocadores)):

                    $usuario = new locadoresModel();
                    $dados = $usuario->getUserData($IdLocadores);

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

                if ((isset($IdLocadores)) && (!is_null($IdLocadores)) && (!empty($IdLocadores)) && ctype_digit($IdLocadores)):

                    if ((isset($EmailLocadores)) && (!is_null($EmailLocadores)) && (!empty($EmailLocadores))):

                        $EmailLocadores = filter_var($EmailLocadores, FILTER_SANITIZE_EMAIL);

                        if ((isset($NomeLocadores)) && (!is_null($NomeLocadores)) && (!empty($NomeLocadores))):

                            if ((isset($TelefoneLocadores)) && (!is_null($TelefoneLocadores)) && (!empty($TelefoneLocadores))):

                                $update = new locadoresModel();
                                $dados = $update->updateUserData($IdLocadores, $NomeLocadores, $EmailLocadores, $TelefoneLocadores);

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

                if ((isset($IdLocadores)) && (!is_null($IdLocadores)) && (!empty($IdLocadores)) && ctype_digit($IdLocadores)):

                    $update = new locadoresModel();
                    $dados = $update->deleteUserData($IdLocadores);

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

                if ((isset($EmailLocadores)) && (!is_null($EmailLocadores)) && (!empty($EmailLocadores))):

                    $EmailLocadores = filter_var($EmailLocadores, FILTER_SANITIZE_EMAIL);

                    if ((isset($NomeLocadores)) && (!is_null($NomeLocadores)) && (!empty($NomeLocadores))):

                        if ((isset($TelefoneLocadores)) && (!is_null($TelefoneLocadores)) && (!empty($TelefoneLocadores))):

                            $TelefoneLocadores = preg_replace("/[^0-9]/", "", $TelefoneLocadores);
                            $add = new locadoresModel();
                            $dados = $add->addUserData($EmailLocadores, $NomeLocadores, $TelefoneLocadores);
        
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