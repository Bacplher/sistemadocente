<?php
/**
 * Created by PhpStorm.
 * User: USUARIO
 * Date: 13/11/2014
 * Time: 12:36 AM
 */


class perfilModelo  extends Consulta{

    public $table = 'docente';
    public $campo= 'IdDocente';
    public $IdDocente;
    public $Nombre;
    public $ApellidoPaterno;
    public $ApellidoMaterno;
    public $Edad;
    public $Celular;
    public $Email;
    public $Sexo;
    public $Clave;
    public $Dni;



    public function perfilDocente_dp($dato){
        $consultaSQL = $this->selectperfildocente_dp($this->campo,$dato);
        return $consultaSQL;
    }

    public function perfilDocente_ia($dato)
    {
        $consultaSQL = $this->selectperfildocente_ia($dato);
        return $consultaSQL;
    }

    public function acualizarPerfil($dato){
        $consultaSQL =$this->_db->query( "UPDATE  docente  set Nombre='$this->Nombre',ApellidoPaterno='$this->ApellidoPaterno',ApellidoMaterno='$this->ApellidoMaterno',Edad='$this->Edad', Celular='$this->Celular', Email='$this->Email',Sexo='$this->Sexo',Dni='$this->Dni',Clave='$this->Clave',Especialidad='$this->Especialidad'  WHERE IdDocente=$dato");

    }
} 