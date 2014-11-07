<?php


class cursoModelo extends Modelo{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function getCurso(){
        $curso = $this->_db->query("select * from curso");
        return $curso->fetchall();
    }

}
