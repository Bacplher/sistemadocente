<?php
/**
 * Created by PhpStorm.
 * User: USUARIO
 * Date: 13/11/2014
 * Time: 12:36 AM
 */


class perfilModelo  extends Consulta{


    public $dato = 11111111;

    public function perfilDocente()
    {
        $consultaSQL = $this->selectperfildocente($this->dato);
        return $consultaSQL;
    }

} 