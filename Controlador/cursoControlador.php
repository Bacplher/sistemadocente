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


    public function nuevo() {
        if (@$_POST["guardar"] == '1') {
            $this->_curso->Descripcion = @$_POST['Descripcion'];
            $this->_curso->Objetivo = @$_POST['Objetivo'];
            //$this->_curso->ApellidoMaterno = @$_POST['ApellidoMaterno'];
            $this->_curso->Email = @$_POST['Email'];
            $this->_curso->getInsertar();
            $this->redireccionar('curso');
        }
//aun no  se define

        $nuevo = $this->loadModelo('curso');
        //$this->_vista->form = $nuevo->getInsertar();
        $this->_vista->action = BASE_URL . 'curso/nuevo';
        $this->_vista->titulo = 'Editar';
        $this->_vista->renderizar('form');

    }

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('curso');
        }
        $this->_curso->IdCurso = $this->filtrarInt($id);
        $this->_curso->getEliminar();
        $this->redireccionar('curso');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('curso');
        }

        if (@$_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            $this->_curso->Descripcion = @$_POST['Descripcion'];
            $this->_curso->Objetivo = @$_POST['Objetivos'];
            $this->_curso->getActualizar();
            $this->redireccionar('curso');
        }

    }


}