<?php
    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Core/Core.php');
    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Core/Controller.php');


    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Controllers/imoveisController.php');
    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Controllers/homeController.php');
    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Controllers/locadoresController.php');
    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Controllers/locatariosController.php');
    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Controllers/loginController.php');
    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Controllers/logoutController.php');
    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Controllers/usuariosController.php');

    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Models/imoveisModel.php');
    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Models/homeModel.php');
    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Models/locadoresModel.php');
    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Models/locatariosModel.php');
    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Models/loginModel.php');
    require_once __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/App/Models/usuariosModel.php');

    require_once 'App/Models/Conexao.php';

    require_once 'App/lib/config.php';
    require_once 'App/lib/SecSession.php';
    require_once 'App/lib/functions.php';

    define("PAGE_AUTHOR", "Autor");
    define("PUBLISHER", "Editor");
    define("SITE_NAME", "Nome do site");
    define("TWITTER_USER", "twitter");
    define("THEME_COLOR", "#FF6600");

    sec_session_start();
    check_sec_session_destroy();
    
    $core = new Core;
    
?>