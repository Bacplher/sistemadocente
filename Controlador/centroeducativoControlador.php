<?php
    class centroeducativoControlador extends Controlador{

        private $_centroeducativo;


        public function __construct()
        {
            parent::__construct();
            $this->_centroeducativo = $this->loadModelo('centroeducativo');
        }
        public function index()
        {
            $datos= $this->_centroeducativo->centroEducativo();
            $this->_vista->centroseducativos = $datos;
            $this->_vista->renderizar('centroeducativo');
        }


    }
?>