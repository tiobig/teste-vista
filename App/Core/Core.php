<?php

    class Core {

        public function __construct()
        {
            $this->url($_GET);
        }

        public function url ($urlGet)
        {

            if ((!isset($urlGet['a'])) || empty($urlGet['a']) || is_null($urlGet['a']) || ($urlGet['a'] == 'index') || ($urlGet['a'] == 'home')):
                
                $url = 'home';
                $controller = $url.'Controller';
                                
            else:

                $url = $urlGet['a'];
                $controller = $url.'Controller';

            endif;

            if (isset($urlGet['b'])):

                if (ctype_digit($urlGet['b'])):

                    $method = 'view'.ucfirst($url);
                    $dataModel = ["ID" => $urlGet['b']];

                else:

                    $method = $urlGet['b'];
                    $dataModel = array();

                endif;

            else:

                $method = 'index';
                $dataModel = array();

            endif;


            if (class_exists($controller) && method_exists($controller, $method)):

                $control = new $controller;
                call_user_func_array(array($control, $method), $dataModel);

            else:
                
                echo "TRARAR 404";

            endif;

        }

    }