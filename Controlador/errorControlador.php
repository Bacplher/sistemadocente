<?php

class errorControlador extends Controlador {
    public function __construct(){
        parent::__construct();

    }
    public  function index(){
        $this->_vista->titulo="error";
        $this->_vista->mensaje=$this->_getError();
        $this->_vista->renderizar('error');
    }
    public function access($codigo)
    {

        $this->_vista->titulo = 'Error';
        $this->_vista->mensaje = $this->_getError($codigo);
        $this->_vista->renderizar('access');
    }
    private function _getError($codigo=false){
        if($codigo){
            $codigo=$this->filtrarInt($codigo);
            if(is_int($codigo)){
                $codigo=$codigo;
            }
        }
        else{
            $codigo='default';
        }
        $error['default']="Ha ocurrido un error";
        $error['5050']="Acceso Restringido";
        if (array_key_exists($codigo,$error)){
            return $error[$codigo];
        }
        else{
            return $error['default'];
        }
    }

}