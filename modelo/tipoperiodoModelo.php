<?php


class tipoperiodoModelo extends Consulta
{

    public $table = "tipoperiodo";
    public $IdTipoPeriodo;
    public $Descripcion;

    public function __construct()
    {
        parent::__construct();
    }

    public function getTipoPeriodo()
    {
        $consultaSQL = $this->Select($this->table);
        return $consultaSQL;
    }

    public function getSelecciona()
    {
        $consultaSQL = $this->_db->query("SELECT * FROM tipoperiodo where IdTipoPeriodo='$this->IdTipoPeriodo'");
        return $consultaSQL->fetchall();
    }

    public function getInsertar()
    {

        /*$alumno = $this->Insertar($this->table, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno, $this->Email);
        return $alumno;*/
        $consultaSQL = $this->_db->query("INSERT INTO tipoperiodo (Descripcion)
        VALUES ('$this->Descripcion'");
    }

    public function getEliminar()
    {

        /*$alumno = $this->Delete($this->table, $this->IdAlumno);
        return $alumno;*/
        $consultaSQL = $this->_db->query("DELETE from tipoperiodo where IdTipoPeriodo='$this->IdTipoPeriodo'");
    }

    public function getActualizar()
    {
        /*$alumno = $this->Update($this->table, $this->IdAlumno, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno, $this->Email);
        return $alumno;*/
        $consultaSQL = $this->_db->query("UPDATE  tipoperiodo  set Descripcion='$this->Descripcion' where IdTipoPeriodo='$this->IdTipoPeriodo'");
    }

}
