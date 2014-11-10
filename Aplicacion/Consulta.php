<?php

abstract class Consulta
{
    protected $_db;

    public function __construct() {
        $this->_db = new Conexion();
    }

    protected function Insertar($tabla,$campo1, $campo2,$campo3,$campo4)
    {
     $consultaSQL = $this->_db->query("INSERT INTO $tabla (Nombre,ApellidoPaterno,ApellidoMaterno,Email)
     VALUES ('$campo1','$campo2','$campo3','$campo4')");

   }
    protected function  Select($table)
    {
            $alumno =$this->_db->query( "SELECT * FROM $table ");
            return $alumno->fetchall();
    }
    protected function  Update($tabla,$codigo,$campo1, $campo2,$campo3,$campo4)
    {
        $alumno =$this->_db->query( "UPDATE  $tabla  set IdAlumno='$codigo' ,Nombre='$campo1',ApellidoPaterno='$campo2',ApellidoMaterno='$campo3',Email='$campo4'  WHERE IdAlumno='$codigo'");
    }
    protected function  Selecciona($table,$codigo)
    {
        $alumno =$this->_db->query( "SELECT * FROM $table where IdAlumno='$codigo'");
        return $alumno->fetchall();
    }

    protected function  Delete($table,$codigo)
    {
        $consulta =$this->_db->query( "DELETE from $table where IdAlumno='$codigo'");
    }
    protected function  Login($table,$campo1,$campo2)
    {
        $consulta =$this->_db->query( "select * from $table where Dni='$campo1' and Contraseña ='$campo2'");
        return $consulta->fetchall();
    }
}