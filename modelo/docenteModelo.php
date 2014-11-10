<?php

class docenteModelo extends consultas {

    private $table = "docente";
    private $campo = "IdDocente";
    private $values;

    public function allDocente(){

        $datos= $this->all($this->table);
        return $datos;
    }

    public function selectDocente(){
        $datos= $this->select($this->table,$this->campo,$this->values);
    }


} 