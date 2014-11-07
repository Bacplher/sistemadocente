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
        $alumno = $this->Select($this->table);
        return $alumno;
    }

    public function getSelecciona()
    {
        $alumno = $this->Selecciona($this->table, $this->IdAlumno);
        return $alumno;
    }

    public function getInsertar()
    {

        $alumno = $this->Insertar($this->table, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno, $this->Email);
        return $alumno;
    }

    public function getEliminar()
    {

        $r = $this->_db->query("DELETE from alumno where IdAlumno='$this->IdAlumno'");
    }

    public function getActualizar()
    {
        $alumno = $this->Update($this->table, $this->IdAlumno, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno, $this->Email);
        return $alumno;
    }

}
