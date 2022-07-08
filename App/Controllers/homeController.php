<?php
    class homeController extends Controller {

        public function index()
        {

            $getHeaders = new homeModel();
            $dadosHeader = $getHeaders->getHeaders();
            $this->loadTemplate('home', array(), $dadosHeader);
            
        }

    }
?>