<?php


class docenteModelo extends Consulta
{

    public $table = "docente";
    public $IdDocente;
    public $Nombre;
    public $ApellidoPaterno;
    public $ApellidoMaterno;
    public $Celular;
    public $Email;
    public $Edad;
    public $Sexo;
    public $Dni;
    public $Contraseña;
    public function __construct()
    {
        parent::__construct();
    }

    public function getDocente()
    {
        $consultaSQL = $this->Select($this->table);
        return $consultaSQL;
    }

    public function getSelecciona()
    {
        $consultaSQL =$this->_db->query( "SELECT * FROM docente where IdDocente='$this->IdDocente'");
        return $consultaSQL->fetchall();
    }

    public function getInsertar()
    {

        /*$alumno = $this->Insertar($this->table, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno, $this->Email);
        return $alumno;*/
        $consultaSQL = $this->_db->query("INSERT INTO docente (Nombre,ApellidoPaterno,ApellidoMaterno,Celular,Email,Edad,Sexo,Dni,Contraseña)
        VALUES ('$this->Nombre','$this->ApellidoPaterno','$this->ApellidoMaterno','$this->Celular','$this->Email','$this->Edad','$this->Sexo','$this->Dni','$this->Contraseña')");
    }

    public function getEliminar()
    {

        /*$alumno = $this->Delete($this->table, $this->IdAlumno);
        return $alumno;*/
        $consultaSQL =$this->_db->query( "DELETE from docente where IdDocente='$this->IdDocente'");
    }

    public function getActualizar()
    {
        /*$alumno = $this->Update($this->table, $this->IdAlumno, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno, $this->Email);
        return $alumno;*/
        $consultaSQL =$this->_db->query( "UPDATE  alumno  set Nombre='$this->Nombre',ApellidoPaterno='$this->ApellidoPaterno',ApellidoMaterno='$this->ApellidoMaterno'
        ,Celular='$this->Celular',Email='$this->Email',Edad='$this->Edad',Sexo='$this->Sexo',Dni='$this->Dni',Contraseña='$this->Contraseña'
        WHERE IdDocente='$this->IdDocente'");
    }

}
