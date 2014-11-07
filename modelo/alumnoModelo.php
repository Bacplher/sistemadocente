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
      // $datos = array(0, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno,$this->Email);
     $r = $this->_db->query("INSERT INTO alumno (Nombre,ApellidoPaterno,ApellidoMaterno,Email)
      VALUES ('$this->Nombre','$this->ApellidoPaterno','$this->ApellidoMaterno','$this->Email')");
     //$r= $this->get_consulta("pa_insertar_alumno", $datos);
       // $r = $this->_db->query("INSERT INTO alumno (Nombre,ApellidoPaterno,ApellidoMaterno,Email) VALUES ('d','d','d','d')");
        //$error = $r[1];
        //$r = null;
        //return $error;
    }

    public function getEliminar() {
        //$datos = array($this->IdAlumno);
        $r = $this->_db->query("DELETE from alumno where IdAlumno='$this->IdAlumno'");
        //$r = $this->get_consulta("pa_eliminar_alumno", $datos);
        //$error = $r[1];
        //$r = null;
        //return $error;
    }

    public function getActualizar() {
       /* $datos = array($this->idproveedor, $this->razon_social, $this->representante, $this->ruc,
            $this->telefono, $this->direccion, $this->email, $this->idubigeo);*/
        /*$r = $this->get_consulta("pa_inserta_act_proveedores", $datos);
        $error = $r[1];
        $r = null;
        return $error;*/
        $r = $this->_db->query("UPDATE  alumno  set IdAlumno='$this->IdAlumno' ,Nombre='$this->Nombre',ApellidoPaterno='$this->ApellidoPaterno',ApellidoMaterno='$this->ApellidoMaterno',Email='$this->Email'  WHERE IdAlumno='$this->IdAlumno'");
    }

}
