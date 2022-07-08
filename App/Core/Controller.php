<?php

    class Controller {

        public $dados;
        public $dadosHeader;

        public function __construct() 
        {
            $this->dados = array();
        }

        public function loadTemplate(string $nameView, $dataModel = array(), $dataHeder = array())
        {

            $this->dados = $dataModel;
            $this->dadosHeader = $dataHeder;
            $headers = $this->dadosHeader;
            extract ($headers);
            $style = explode(',', str_replace(' ','',$css));
            $javascript = explode(',', str_replace(' ','',$js));
            $path = str_replace('/', DIRECTORY_SEPARATOR,'/../Templates/Default.php');
            require_once __DIR__.$path;

        }

        public function loadView(string $nameView, $dataModel)
        {

            $path = str_replace('/', DIRECTORY_SEPARATOR,'/../Views/'.$nameView.'.php');
            require __DIR__.$path;

        }

    }