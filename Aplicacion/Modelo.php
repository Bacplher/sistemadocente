<?php


class Modelo{
    protected $_db;
    
 public function __construct() {
     $this->_db = new Conexion();
 }
    
}