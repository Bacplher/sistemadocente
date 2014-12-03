<?php

class docenteControlador extends Controlador
{
    private $_docente;
    public $table = 'docente';
    public $campo = 'Nombre';

    public function __construct()
    {
        parent::__construct();
        $this->_docente = $this->loadModelo('docente');
    }

    public function index()
    {
        if(isset($_POST['nombredocente'])){
            $datos= $this->_docente->buscar($_POST['nombredocente'],$this->table,$this->campo);
        }else{
            $datos= $this->_docente->getDocente();
        }
        $this->_vista->docente = $datos;
        $this->_vista->renderizar('docente');

    }

    public function nuevo()
    {
        if (@$_POST["guardar"] == '1') {
            $this->_docente->Nombre = @$_POST['Nombre'];
            $this->_docente->ApellidoPaterno = @$_POST['ApellidoPaterno'];
            $this->_docente->ApellidoMaterno = @$_POST['ApellidoMaterno'];
            $this->_docente->Celular = @$_POST['Celular'];
            $this->_docente->Email = @$_POST['Email'];
            $this->_docente->Edad = @$_POST['Edad'];
            $this->_docente->Sexo = @$_POST['Sexo'];
            $this->_docente->Dni = @$_POST['Dni'];
            $this->_docente->Clave = @$_POST['Clave'];
            $this->_docente->getInsertar();
            $this->redireccionar('docente');
        }


        $nuevo = $this->loadModelo('docente');
        $this->_vista->action = BASE_URL . 'docente/nuevo';
        $this->_vista->titulo = 'Ingresar Docente';
        $this->_vista->renderizar('form');

    }

    public function eliminar($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('docente');
        }
        $this->_docente->IdDocente = $this->filtrarInt($id);
        $this->_docente->getEliminar();
        $this->redireccionar('docente');
    }

    public function editar($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('docente');
        }
        if (@$_POST["guardar"] == '1') {
            $this->_docente->Nombre = @$_POST['Nombre'];
            $this->_docente->ApellidoPaterno = @$_POST['ApellidoPaterno'];
            $this->_docente->ApellidoMaterno = @$_POST['ApellidoMaterno'];
            $this->_docente->Celular = @$_POST['Celular'];
            $this->_docente->Email = @$_POST['Email'];
            $this->_docente->Edad = @$_POST['Edad'];
            $this->_docente->Sexo = @$_POST['Sexo'];
            $this->_docente->Dni = @$_POST['Dni'];
            $this->_docente->Clave = @$_POST['Clave'];
            $this->_docente->getActualizar();
            $this->redireccionar('docente');
        }
        $this->_docente->IdDocente = $this->filtrarInt($id);
        $this->_vista->docente = $this->_docente->getSelecciona();
        $nuevo = $this->loadModelo('docente');
        $this->_vista->titulo = "Actualizar Docente";
        $this->_vista->renderizar('form');

    }
}