<?php


class cursoModelo extends Modelo{

    public $IdCurso;
    public $IdCentroEducativo;
    public $Descripcion;
    public $Objetivo;

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function getCurso(){
        $curso = $this->_db->query("select * from curso");
        return $curso->fetchall();
    }

    public function getInsertar(){

    }

    public function getActualizar(){

    }

    public function getEliminar(){

    }

}
