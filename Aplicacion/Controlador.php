<?php

abstract class Controlador{
    protected $_vista;
    public function __construct() {
        $this->_vista = new Vista(new Request);
    }    
    abstract public function index();
    
    protected function loadModelo ($modelo){
        
        $modelo = $modelo . 'Modelo';
        $rutaModelo = ROOT . 'modelo' . DS .$modelo . '.php';
        
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
        $modelo = new $modelo;
        return $modelo;}
            else{
            throw new Exception('Error de modelo');
            }
}

protected function getLibrary($libreria){
    $rutaLibreria = ROOT . 'libs'. DS . $libreria . '.php';
    if(is_readable($rutaLibreria)){
        require_once $rutaLibreria;        
    }
    else{
        throw new Exception('Error de libreria');
    }
}

    protected function redireccionar($ruta = false) {
        if ($ruta) {
            die("<script> window.location='".BASE_URL."$ruta'; </script>");
//            header('location:' . BASE_URL . $ruta);
            exit;
        } else {
            die("<script> window.location='".BASE_URL."index'; </script>");
//            header('location:' . BASE_URL);
            exit;
        }
    }

}