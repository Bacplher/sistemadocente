<?php

class indexControlador extends Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->_vista->titulo = 'Portada';
        $this->_vista->renderizar('index');
    }
}