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

    public function perfilDocente_dp($dato){
        $consultaSQL = $this->selectperfildocente_dp($this->campo,$dato);
        return $consultaSQL;
    }

    public function perfilDocente_ia($dato)
    {
        $consultaSQL = $this->selectperfildocente_ia($dato);
        return $consultaSQL;
    }

} 