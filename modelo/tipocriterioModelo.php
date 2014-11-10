<?php


class tipocriterioModelo extends Consulta
{

    public $table = "tipocriterio";
    public $IdTipoCriterio;
    public $Descripcion;

    public function __construct()
    {
        parent::__construct();
    }

    public function getTipoCriterio()
    {
        $consultaSQL = $this->Select($this->table);
        return $consultaSQL;
    }

    public function getSelecciona()
    {
        $consultaSQL = $this->_db->query("SELECT * FROM tipocriterio where IdTipoCriterio='$this->IdTipoCriterio'");
        return $consultaSQL->fetchall();
    }

    public function getInsertar()
    {

        /*$alumno = $this->Insertar($this->table, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno, $this->Email);
        return $alumno;*/
        $consultaSQL = $this->_db->query("INSERT INTO tipocriterio (Descripcion)
        VALUES ('$this->Descripcion'");
    }

    public function getEliminar()
    {

        /*$alumno = $this->Delete($this->table, $this->IdAlumno);
        return $alumno;*/
        $consultaSQL = $this->_db->query("DELETE from tipocriterio where IdTipoCriterio='$this->IdTipoCriterio'");
    }

    public function getActualizar()
    {
        /*$alumno = $this->Update($this->table, $this->IdAlumno, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno, $this->Email);
        return $alumno;*/
        $consultaSQL = $this->_db->query("UPDATE  tipocriterio  set Descripcion='$this->Descripcion' where IdTipoCriterio='$this->IdTipoCriterio'");
    }

}
