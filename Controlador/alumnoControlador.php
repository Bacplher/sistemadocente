<?php
class alumnoControlador extends Controlador{
    private $_alumno;
    public function __construct() {
        parent::__construct();
        $this->_alumno=$this->loadModelo('alumno');
    }
    public function index(){

        $alumno = $this->loadModelo('alumno');
        $this->_vista->alumnos = $alumno->getAlumnos();
        $this->_vista->titulo = 'Portada';
        $this->_vista->renderizar('alumno');

    }

    public function nuevo() {
     if (@$_POST["guardar"] == '1') {
            $this->_alumno->Nombre = @$_POST['Nombre'];
            $this->_alumno->ApellidoPaterno = @$_POST['ApellidoPaterno'];
            $this->_alumno->ApellidoMaterno = @$_POST['ApellidoMaterno'];
            $this->_alumno->Email = @$_POST['Email'];
            $this->_alumno->getInsertar();
            $this->redireccionar('alumno');
     }
//aun no  se define

        $nuevo = $this->loadModelo('alumno');
        //$this->_vista->form = $nuevo->getInsertar();
        $this->_vista->action = BASE_URL . 'alumno/nuevo';
        $this->_vista->titulo = 'Editar';
        $this->_vista->renderizar('form');

    }
}