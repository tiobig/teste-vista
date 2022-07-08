<?php

    function sec_session_start()
        {
        $path = str_replace('/', DIRECTORY_SEPARATOR,'/config.php');
        require_once __DIR__.$path;
        if (ini_set('session.use_only_cookies', 1) === FALSE):
            header ("location:".HTTP_PAGE);
            exit();
        endif;
        setcookie(session_name(SESSION_NAME_VAR), '', SESSION_TIME, HTTP_DIR, HTTP_DOMAIN, SESSION_SECURITY, SESSION_HTTP);
        session_set_cookie_params(SESSION_TIME, HTTP_DIR, HTTP_DOMAIN, SESSION_SECURITY, SESSION_HTTP);
        if (session_status() != 2) session_start();
        session_regenerate_id();
        }

        function check_sec_session_destroy() {
            $session_name = SESSION_NAME_VAR;
            if(!isset($_SESSION['logado'])) {
                session_destroy();
                setcookie(session_name($session_name), null, 0, "/", "", 0, true);
            } elseif($_SESSION['logado'] != "SIM") {
                session_destroy();
                setcookie(session_name($session_name), null, 0, "/", "", 0, true);
            }
        }
?>        