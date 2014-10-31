<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alumnoModelo
 *
 * @author MarlonP
 */
class alumnoModelo extends Modelo{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function getAlumnos(){
        $alumno = $this->_db->query("select * from alumno");
        return $alumno->fetchall();
    }
   
}
