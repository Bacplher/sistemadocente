<?php

abstract class Consulta
{
    protected $_db;

    public function __construct() {
        $this->_db = new Conexion();
    }

    protected function Insertar($tabla,$Nombre, $ApellidoPaterno,$ApellidoMaterno,$Email)
    {
     $consultaSQL = $this->_db->query("INSERT INTO $tabla (Nombre,ApellidoPaterno,ApellidoMaterno,Email)
     VALUES ('$Nombre','$ApellidoPaterno','$ApellidoMaterno','$Email')");

   }
    protected function  Select($table)
    {
            $alumno =$this->_db->query( "SELECT * FROM $table ");
            return $alumno->fetchall();
    }
    
    protected function  Selecciona($table,$IdAlumno)
    {
        $alumno =$this->_db->query( "SELECT * FROM $table where IdAlumno='$IdAlumno'");
        return $alumno->fetchall();
    }
}