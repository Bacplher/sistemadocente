<?php

class asistenciaControlador extends Controlador
{
    private $_asistencia;
    private $_alumno;

    public function __construct()
    {
        parent::__construct();
        $this->_asistencia = $this->loadModelo('asistencia');
        $this->_asistencia = $this->loadModelo('alumno');
    }

    public function index()
    {

        $asistencia = $this->loadModelo('asistencia');
        $this->_vista->asistencia = $asistencia->getAsistencia();
        $this->_vista->titulo = 'Portada';
        $this->_vista->renderizar('asistencia');

    }

    public function nuevo()
    {
        if (@$_POST["guardar"] == '1') {
            $this->_asistencia->alumno_IdAlumno = @$_POST['alumno_IdAlumno'];
            $this->_asistencia->clase_IdClase = @$_POST['clase_IdClase'];
            $this->_asistencia->Asistio = @$_POST['Asistio'];
            $this->_asistencia->Observaciones = @$_POST['Observaciones'];
            $this->_asistencia->getInsertar();
            $this->redireccionar('asistencia');
        }


        $nuevo = $this->loadModelo('asistencia');

        $this->_vista->action = BASE_URL . 'asistencia/nuevo';
        $this->_vista->titulo = 'Ingresar Asistencia';
        //$this->_vista->alumno_IdAlumno=$this->_alumno->getSelecciona();
        $this->_vista->renderizar('form');
    }

    public function eliminar($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('asistencia');
        }
        $this->_asistencia->IdAlumno = $this->filtrarInt($id);
        $this->_asistencia->getEliminar();
        $this->redireccionar('asistencia');
    }

    public function editar($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('alumno');
        }
        if (@$_POST["guardar"] == '1') {
            $this->_asistencia->IdAlumno = $this->filtrarInt($id);
            $this->_asistencia->Nombre = @$_POST['Nombre'];
            $this->_asistencia->ApellidoPaterno = @$_POST['ApellidoPaterno'];
            $this->_asistencia->ApellidoMaterno = @$_POST['ApellidoMaterno'];
            $this->_asistencia->Email = @$_POST['Email'];

            $this->_asistencia->getActualizar();
            $this->redireccionar('asistencia');
        }
        $this->_asistencia->IdAlumno = $this->filtrarInt($id);
        $this->_vista->asistencia = $this->_asistencia->getSelecciona();
        $nuevo = $this->loadModelo('asistencia');
        $this->_vista->titulo = "Actualizar Asistencia";
        $this->_vista->renderizar('form');

    }
}