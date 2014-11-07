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

    public function eliminar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('alumno');
        }
        $this->_alumno->IdAlumno = $this->filtrarInt($id);
        $this->_alumno->getEliminar();
        $this->redireccionar('alumno');
    }

    public function editar($id) {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('alumno');
        }

        if (@$_POST['guardar'] == 1) {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            exit;
            $this->_alumno->Nombre = @$_POST['Nombre'];
            $this->_alumno->ApellidoPaterno = @$_POST['ApellidoPaterno'];
            $this->_alumno->ApellidoMaterno = @$_POST['ApellidoMaterno'];
            $this->_alumno->Email = @$_POST['Email'];
            $this->_alumno->getActualizar();
            $this->redireccionar('alumno');
        }
        $this->_alumno->IdAlumno = $this->filtrarInt($id);

        /*$datos = $this->_alumno->selecciona();
        //obtenemos todas las regiones que pertenecen al pais del proveedor
        $this->_regiones->idpais = $datos[0]['PAIS'];
        $this->_vista->datos_regiones = $this->_regiones->selecciona();
        //obtenemos todas las provincias que pertenecen a la región del proveedor
        $this->_provincias->codigo_region = $datos[0]['IDREGION'];
        $this->_vista->datos_provincias = $this->_provincias->selecciona();
        //obtenemos todas las ciudades que pertenecen a la provincia del proveedor
        $this->_ubigeos->codigo_provincia = $datos[0]['IDPROVINCIA'];
        $this->_vista->datos_ubigeos = $this->_ubigeos->selecciona();

        $this->_vista->datos = $datos;*/
        $this->_vista->titulo = 'Actualizar Proveedor';
        $this->_vista->setJs(array('funciones_form'));
        //$this->_vista->setJs(array('funciones_form'));
        $this->_vista->renderizar('form');
    }
}