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
        $consultaselect = "select * from $tabla where Dni='".$dni."' and Clave ='".$clave."'";
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
        $consultaperfildocente = "SELECT especialidad.Descripcion AS Especialidad, centroeducativo.Descripcion as Centro_Educativo,
                                   curso.Descripcion AS Curso, grado.Descripcion AS Grado, seccion.Descripcion AS Seccion 
                                   FROM docente 
                                   INNER JOIN especialidad ON docente.IdDocente=especialidad.IdDocente 
                                   INNER JOIN centroeducativo ON docente.IdDocente=centroeducativo.IdDocente 
                                   INNER JOIN grado ON centroeducativo.IdCentroEducativo=grado.IdCentroEducativo 
                                   INNER JOIN seccion ON grado.IdGrado=seccion.IdGrado 
                                   INNER JOIN curso ON curso.IdSeccion = curso.IdSeccion WHERE IdDocente=$dato";
        $sql=$db->prepare($consultaperfildocente);
        $resultado=$sql->execute();
        $db->cerrar();
        return $sql->fetchAll();
    }
    
    public function selectct($dato){
      $db = new conexion();
      $consultarcursocentrodetrabajo = "SELECT centroeducativo.IdCentroEducativo as IdCentroEducativo,
                                        centroeducativo.Descripcion as centroeducativo
                                        FROM centroeducativo
                                        INNER JOIN docente ON docente.IdDocente = centroeducativo.IdDocente
                                        WHERE docente.dni=$dato";
      $sql=$db->prepare($consultarcursocentrodetrabajo);
        $resultado=$sql->execute();
        $db->cerrar();
        return $sql->fetchAll();
    }
    
    public function selectgrado($dato,$centroedu){
      $db = new conexion();
      $consultarcursogrado = "SELECT grado.IdGrado as codgrado, grado.Descripcion as dgrado
                              FROM grado
                              INNER JOIN centroeducativo ON centroeducativo.IdCentroEducativo = grado.IdCentroEducativo
                              INNER JOIN docente ON docente.IdDocente = centroeducativo.IdDocente
                              WHERE docente.dni=$dato and centroeducativo.IdCentroEducativo=$centroedu";
      $sql=$db->prepare($consultarcursogrado);
        $resultado=$sql->execute();
        $db->cerrar();
        return $sql->fetchAll();
    }

    public function selectseccion($dato,$centroedu,$grad){
      $db = new conexion();
      $consultarseccion = "SELECT seccion.IdSeccion as codseccion, seccion.Descripcion as dseccion
                                FROM seccion 
                                INNER JOIN grado ON grado.IdGrado = seccion.IdGrado
                                INNER JOIN centroeducativo ON centroeducativo.IdCentroEducativo = grado.IdCentroEducativo
                                INNER JOIN docente ON docente.IdDocente = centroeducativo.IdDocente
                                WHERE docente.dni=$dato and centroeducativo.IdCentroEducativo=$centroedu 
                                and grado.IdGrado=$grad";
      $sql=$db->prepare($consultarseccion);
        $resultado=$sql->execute();
        $db->cerrar();
        return $sql->fetchAll();
    }

    public function selectcurso($dato,$centroedu,$grad,$secc){
      $db = new conexion();
      $consultarcurs = "SELECT curso.IdCurso as codcurso, curso.Descripcion as dcurso
                                FROM curso
                                INNER JOIN seccion ON  seccion.IdSeccion = curso.IdSeccion
                                INNER JOIN grado ON grado.IdGrado = seccion.IdGrado
                                INNER JOIN centroeducativo ON centroeducativo.IdCentroEducativo = grado.IdCentroEducativo
                                INNER JOIN docente ON docente.IdDocente = centroeducativo.IdDocente
                                WHERE docente.dni=$dato and centroeducativo.IdCentroEducativo=$centroedu 
                                and grado.IdGrado=$grad and seccion.IdSeccion=$secc";
      $sql=$db->prepare($consultarcurs);
        $resultado=$sql->execute();
        $db->cerrar();
        return $sql->fetchAll();
    }
}