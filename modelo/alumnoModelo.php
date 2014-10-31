<?php


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
