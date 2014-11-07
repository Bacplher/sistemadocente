<?php

abstract class Controlador{
    protected $_vista;
    protected $_modelo;
    protected $_modeloalert;
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

    protected function filtrarInt($int) {
        $int = (int) $int;
        if (is_int($int)) {
            return $int;
        } else {
            return 0;
        }
    }

    protected function fecha_en($fecha) {
        $d = substr($fecha, 0, 2);
        $m = substr($fecha, 3, 2);
        $a = substr($fecha, 6, 4);
        return "$a-$m-$d";
    }
    public function get_matriz($datos, $cabeceras) {
        $nuevo;
        for ($i = 0; $i < count($datos); $i++) {
            for ($j = 0; $j < count($cabeceras); $j++) {
                $nuevo[$i][$cabeceras[$j]] = $datos[$i][$cabeceras[$j]];
            }
        }
        return $nuevo;
    }
}