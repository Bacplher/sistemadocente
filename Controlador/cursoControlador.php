<?php
class cursoControlador extends Controlador{
    public function __construct() {
        parent::__construct();
    }
    public function index(){

        $curso = $this->loadModelo('curso');
        $this->_vista->curso = $curso->getCurso();
        $this->_vista->titulo = 'Portada';
        $this->_vista->renderizar('curso');
    }
}