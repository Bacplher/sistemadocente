<?php


class indexModelo extends Consulta
{

    public $table = "docente";
    public $Dni;
    public $Contraseña;

    public function __construct()
    {
        parent::__construct();
    }

    /*public function  getLogin()
    {
        $docente = $this->Login($this->table, $this->Dni, $this->Contraseña);
        return $docente;
    }*/

}
