<?php

class Modelo {
    protected $_db;
    
 public function __construct() {
     $this->_db = new Conexion();
 }
    protected static function get_consulta($pa, $datos) {
        $bd = new conexion();
        $bd->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
        //return self::procedimientoAlmacenado($pa, $datos, $bd);

    }
}




