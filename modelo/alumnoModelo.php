<?php

class alumnoModelo extends Consulta
{

    public $table = "alumno";
    public $IdAlumno;
    public $Nombre;
    public $ApellidoPaterno;
    public $ApellidoMaterno;
    public $Email;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAlumnos()
    {
        $consultaSQL = $this->Select($this->table);
        return $consultaSQL;
    }

    public function getSelecciona()
    {
        $consultaSQL =$this->_db->query( "SELECT * FROM alumno where IdAlumno='$this->IdAlumno'");
        return $consultaSQL->fetchall();
    }

    public function getInsertar()
    {

        /*$alumno = $this->Insertar($this->table, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno, $this->Email);
        return $alumno;*/
        $consultaSQL = $this->_db->query("INSERT INTO alumno (Nombre,ApellidoPaterno,ApellidoMaterno,Email)
        VALUES ('$this->Nombre','$this->ApellidoPaterno','$this->ApellidoMaterno','$this->Email')");
    }

    public function getEliminar()
    {

        /*$alumno = $this->Delete($this->table, $this->IdAlumno);
        return $alumno;*/
        $consultaSQL =$this->_db->query( "DELETE from alumno where IdAlumno='$this->IdAlumno'");
    }

    public function getActualizar()
    {
        /*$alumno = $this->Update($this->table, $this->IdAlumno, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno, $this->Email);
        return $alumno;*/
        $consultaSQL =$this->_db->query( "UPDATE  alumno  set IdAlumno='$this->IdAlumno' ,Nombre='$this->Nombre',ApellidoPaterno='$this->ApellidoPaterno',ApellidoMaterno='$this->ApellidoMaterno',Email='$this->Email'  WHERE IdAlumno='$this->IdAlumno'");
    }

}
