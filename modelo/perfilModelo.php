<?php
/**
 * Created by PhpStorm.
 * User: USUARIO
 * Date: 13/11/2014
 * Time: 12:36 AM
 */


class perfilModelo  extends Consulta{

    public $table = 'docente';
    public $dato = 22222222;
    public $campo= 'Dni';

    public function perfilDocente_dp(){
        $consultaSQL = $this->selectperfildocente_dp($this->campo,$this->dato);
        return $consultaSQL;
    }

    public function perfilDocente_ia()
    {
        $consultaSQL = $this->selectperfildocente_ia($this->dato);
        return $consultaSQL;
    }

} 