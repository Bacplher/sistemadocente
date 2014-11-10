<?php

class tipocriterioControlador extends Controlador
{
    private $_tipocriterio;

    public function __construct()
    {
        parent::__construct();
        $this->_tipocriterio = $this->loadModelo('tipocriterio');
    }

    public function index()
    {

        $tipocriterio = $this->loadModelo('tipocriterio');
        $this->_vista->tipocriterio = $tipocriterio->getTipoCriterio();
        $this->_vista->titulo = 'Portada';
        $this->_vista->setCss(array('estilos_index'));
        $this->_vista->setJs(array('funcion'));
        $this->_vista->renderizar('tipocriterio');

    }

    public function nuevo()
    {
        if (@$_POST["guardar"] == '1') {
            $this->_tipocriterio->Descripcion = @$_POST['Descripcion'];
            $this->_tipocriterio->getInsertar();
            $this->redireccionar('tipocriterio');
        }


        $nuevo = $this->loadModelo('tipocriterio');
        $this->_vista->action = BASE_URL . 'tipocriterio/nuevo';
        $this->_vista->titulo = 'Ingresar Tipo Criterio';
        $this->_vista->renderizar('form');

    }

    public function eliminar($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipocriterio');
        }
        $this->_tipocriterio->IdTipoCriterio = $this->filtrarInt($id);
        $this->_tipocriterio->getEliminar();
        $this->redireccionar('tipocriterio');
    }

    public function editar($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('tipocriterio');
        }
        if (@$_POST["guardar"] == '1') {
            $this->_tipocriterio->Descripcion = @$_POST['Descripcion'];
            $this->_tipocriterio->getActualizar();
            $this->redireccionar('tipocriterio');
        }
        $this->_tipocriterio->IdTipoCriterio = $this->filtrarInt($id);
        $this->_vista->tipocriterio = $this->_tipocriterio->getSelecciona();
        $nuevo = $this->loadModelo('tipocriterio');
        $this->_vista->titulo = "Actualizar Tipo Criterio";
        $this->_vista->renderizar('form');

    }
}