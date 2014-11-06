<?php


class alumnoModelo extends Modelo{
    //put your code here

    public $IdAlumno;
    public $Nombre;
    public $ApellidoPaterno;
    public $ApellidoMaterno;
    public $Email;
    public function __construct() {
        parent::__construct();
    }
    public function getAlumnos(){
        $alumno = $this->_db->query("select * from alumno");
        return $alumno->fetchall();
    }


    public function getInsertar() {
        $datos = array(0, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno,$this->Email);
      /* $r = $this->_db->query("INSERT INTO alumno (Nombre,ApellidoPaterno,ApellidoMaterno,Email)
       VALUES ($this->Nombre,$this->ApellidoPaterno,$this->ApellidoMaterno,$this->Email)");*/
     $r= $this->get_consulta("pa_insertar_alumno", $datos);
       $error = $r[1];
      $r = null;
      return $error;
    }

    public function getElimina() {
        $datos = array($this->IdAlumno);
        $r = $this->get_consulta("pa_elimina_alumno", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}
