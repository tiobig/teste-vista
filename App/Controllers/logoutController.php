<?php
    class logoutController extends Controller {

        public function index()
        {

            sec_session_start();
            if (isset($_COOKIE['acceptCookies'])):
                $cookie = 'true';
            else:
                $cookie = "";
            endif;
            if (isset($_COOKIE[session_name()])):
                setcookie(session_name(), "", time()-3600, "/" );
            endif;
            $_COOKIE = array();
            $_SESSION = array();
            session_destroy();
            unset($_SESSION);
            if ($cookie == 'true'):
                $_COOKIE['acceptCookies'] = 'true';
            endif;
            header ("location:".HTTP_PAGE);
            
    }

}
?>