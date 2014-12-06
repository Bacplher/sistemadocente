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
    public function Login($tabla,$dni,$clave){
        $db = new conexion();
        $consultaselect = "select Dni from $tabla where Dni='".$dni."' and Clave ='".$clave."'";
        //$consultaselect = "select Dni from $tabla where Dni='".$dni."' ";
        $sql=$db->prepare($consultaselect);
        $resultado= $sql->execute();
        // $db->cerrar();
        return $sql->fetchAll();

    }

    public function buscar($search,$tabla,$campo){
        $db = new conexion();
        $consultaselect = "SELECT * FROM $tabla WHERE $campo LIKE '%$search%'";
        $sql=$db->prepare($consultaselect);
        $resultado= $sql->execute();

        $db->cerrar();
        return $sql->fetchAll();
    }

    public function selectperfildocente_dp($campo,$dato){
        $db = new conexion();
        $consulta = "SELECT Nombre, ApellidoPaterno, ApellidoMaterno, Edad, Celular,
                                  Email, Sexo, Dni
                                  FROM docente
                                  WHERE $campo= $dato";
        $sql = $db->prepare($consulta);
        $resultado=$sql->execute();
        $db->cerrar();
        return $sql->fetchAll();

    }
    public function selectperfildocente_ia($dato){
        $db = new conexion();
        $consultaperfildocente = "SELECT especialidad.Descripcion AS Especialidad,
                                  centroeducativo.Descripcion as Centro_Educativo,
                                  curso.Descripcion AS Curso, grado.Descripcion AS Grado, seccion.Descripcion AS Seccion
                                  FROM docente
                                  LEFT JOIN especialidad ON docente.IdDocente=especialidad.IdDocente
                                  LEFT JOIN centroeducativo ON docente.IdDocente=centroeducativo.IdDocente
                                  LEFT JOIN curso ON centroeducativo.IdCentroEducativo=curso.IdCentroEducativo
                                  LEFT JOIN grado ON curso.IdCurso=grado.IdCurso
                                  LEFT JOIN seccion ON grado.IdGrado=seccion.IdGrado
                                  WHERE Dni=$dato";
        $sql=$db->prepare($consultaperfildocente);
        $resultado=$sql->execute();
        $db->cerrar();
        return $sql->fetchAll();
    }
}