<?php
    class loginController extends Controller {

        public function index()
        {

            if ((isset($_SERVER['REQUEST_METHOD'])) && (($_SERVER['REQUEST_METHOD']) == "POST") && (isset($_SERVER['HTTP_REFERER'])) && (mb_strpos($_SERVER['HTTP_REFERER'], HTTP_PAGE) !== false)):

                extract($_POST);

                if ((isset($senha)) && (!is_null($senha)) && (!empty($senha)) && (isset($email)) && (!is_null($email)) && (!empty($email))):

                    $senha = md5(crypt($senha, SALTO));
                    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                    $login = new loginModel();
                    $dados = $login->login($email,$senha);
                    extract($dados);

                    if ($mensagem === 'OK'):
                        sec_session_start();
                        $_SESSION["nome"] = $NomeUser;
                        $_SESSION["email"] = $email;
                        $_SESSION["telefone"] = $TelefoneUser;
                        $_SESSION["id"] = $idUser;
                        $_SESSION['logado'] = "SIM";
                    endif;

                else:

                    $mensagem = "Erro no envio dos dados";

                endif;

            else:

                $mensagem = "Erro na solicitação";

            endif;

            echo json_encode(array('mensagem' => $mensagem));
            
        }

    }
?>