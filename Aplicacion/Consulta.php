<?php

abstract class Consulta
{
    protected $_db;

    public function __construct() {
        $this->_db = new Conexion();
    }

   /* protected function Insertar($tabla,$campo1, $campo2,$campo3,$campo4)
    {
     $consultaSQL = $this->_db->query("INSERT INTO $tabla (Nombre,ApellidoPaterno,ApellidoMaterno,Email)
     VALUES ('$campo1','$campo2','$campo3','$campo4')");

   }*/
    protected function  Select($table)
    {
        $consultaSQL =$this->_db->query( "SELECT * FROM $table ");
            return $consultaSQL->fetchall();
    }
    /*protected function  Update($tabla,$codigo,$campo1, $campo2,$campo3,$campo4)
    {
        $consultaSQL =$this->_db->query( "UPDATE  $tabla  set IdAlumno='$codigo' ,Nombre='$campo1',ApellidoPaterno='$campo2',ApellidoMaterno='$campo3',Email='$campo4'  WHERE IdAlumno='$codigo'");
    }*/
    /*protected function  Selecciona($table,$codigo)
    {
        $consultaSQL =$this->_db->query( "SELECT * FROM $table where IdAlumno='$codigo'");
        return $consultaSQL->fetchall();
    }*/

    /*protected function  Delete($table,$codigo)
    {
        $consultaSQL =$this->_db->query( "DELETE from $table where IdAlumno='$codigo'");
    }*/
    protected function  Login($table,$campo1,$campo2)
    {
        $consultaSQL =$this->_db->query( "select * from $table where Dni='$campo1' and Contraseña ='$campo2'");
        return $consultaSQL->fetchall();
    }

    public function buscar($search,$tabla,$campo){
        $db = new conexion();
        $consultaselect = "SELECT * FROM $tabla WHERE $campo LIKE '%$search%'";
        $sql=$db->prepare($consultaselect);
        $resultado= $sql->execute();
        $db->cerrar();
        return $sql->fetchAll();
    }
}