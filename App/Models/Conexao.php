<?php

    class Conexao
    {
        private static $pdo;

        private function __construct()
        {
            
        }

        public static function conectaDB():PDO
        {
            $path = str_replace('/', DIRECTORY_SEPARATOR,'/../lib/config.php');
            require_once __DIR__.$path;
            $options = array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
            
            if (!isset(self::$pdo)):

                try {

                    self::$pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASSWD, $options);
                    return self::$pdo;

                } catch(PDOException $exception) {
                    
                    $erro = $exception->getMessage();
                    echo $erro;

                }

            endif;



            
        }

    }