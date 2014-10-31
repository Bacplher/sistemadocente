<?php

class indexControlador extends Controlador{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        
        $alumno = $this->loadModelo('alumno');
        $this->_vista->alumnos = $alumno->getAlumnos();
        $this->_vista->titulo = 'Portada';
        $this->_vista->renderizar('index');
    }
}