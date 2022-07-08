<?php
    class imoveisController extends Controller {

        public function index()
        {

            $getHeaders = new imoveisModel();
            $dadosHeader = $getHeaders->getHeaders();
            $dadosModel = $getHeaders->getImoveis();
            $this->loadTemplate('imoveis', $dadosModel, $dadosHeader);
            
        }

    }

?>