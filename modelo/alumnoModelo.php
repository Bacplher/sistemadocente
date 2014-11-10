<?php


class alumnoModelo  extends  consultas{

    public $table = "alumno";
    public $Nombre;
    public $ApellidoPaterno;
    public $ApellidoMaterno;
    public $Email;

    public function allAlumno()
    {
        $datos = $this->all($this->table);
        return $datos;
    }



    public function insertar()
    {
        $alumno = $this->insert($this->table, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno, $this->Email);


        return $alumno;
    }

    public function getEliminar()
    {

        $alumno = $this->Delete($this->table, $this->IdAlumno);
        return $alumno;
    }

    public function getActualizar()
    {
        $alumno = $this->Update($this->table, $this->IdAlumno, $this->Nombre, $this->ApellidoPaterno, $this->ApellidoMaterno, $this->Email);
        return $alumno;
    }

}
