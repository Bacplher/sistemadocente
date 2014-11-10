<?php


class asistenciaModelo extends Consulta
{

    public $table = "asistencia";
    public $alumno_IdAlumno;
    public $clase_IdClase;
    public $Asistio;
    public $Observaciones;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAsistencia()
    {
        $consultaSQL = $this->Select($this->table);
        return $consultaSQL;
    }

    public function getInsertar()
    {
        $consultaSQL = $this->_db->query("INSERT INTO asistencia (alumno_IdAlumno,clase_IdClase, Asistio, Observaciones)
        VALUES ('$this->alumno_IdAlumno','$this->clase_IdClase','$this->Asistio','$this->Observaciones')");
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
