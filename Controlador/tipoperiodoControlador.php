<?php

class tipoperiodoControlador extends Controlador
{
    private $_tipoperiodo;

    public function __construct()
    {
        parent::__construct();
        $this->_tipoperiodo = $this->loadModelo('tipoperiodo');
    }

    public function index()
    {

        $tipoperiodo = $this->loadModelo('tipoperiodo');
        $this->_vista->tipoperiodo = $tipoperiodo->getTipoPeriodo();
        $this->_vista->titulo = 'Portada';
        $this->_vista->setCss(array('estilos_index'));
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('tipoperiodo');

    }

    public function nuevo()
    {
        if (@$_POST["guardar"] == '1') {
            $this->_tipoperiodo->Descripcion = @$_POST['Descripcion'];
            $this->_tipoperiodo->getInsertar();
            $this->redireccionar('tipoperiodo');
        }


        $nuevo = $this->loadModelo('tipoperiodo');
        $this->_vista->action = BASE_URL . 'tipoperiodo/nuevo';
        $this->_vista->titulo = 'Ingresar tipo periodo ';
        $this->_vista->renderizar('form');

    }

    public function eliminar($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipoperiodo');
        }
        $this->_tipoperiodo->IdTipoPeriodo = $this->filtrarInt($id);
        $this->_tipoperiodo->getEliminar();
        $this->redireccionar('tipoperiodo');
    }

    public function editar($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipoperiodo');
        }
        if (@$_POST["guardar"] == '1') {
            $this->_tipoperiodo->Descripcion = @$_POST['Descripcion'];
            $this->_tipoperiodo->getActualizar();
            $this->redireccionar('tipoperido');
        }
        $this->_tipoperiodo->IdTipoPeriodo = $this->filtrarInt($id);
        $this->_vista->tipoperiodo = $this->_tipoperiodo->getSelecciona();
        $nuevo = $this->loadModelo('tipoperiodo');
        $this->_vista->titulo = "Actualizar Tipo Periodo";
        $this->_vista->renderizar('form');

    }
}