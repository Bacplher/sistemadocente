<?php
/**
 * Created by PhpStorm.
 * User: USUARIO
 * Date: 13/11/2014
 * Time: 12:36 AM
 */

class perfilModelo  extends Consulta{

    public $table = 'docente';

    public function perfilDocente()
    {
        $consultaSQL = $this->Select($this->table);
        return $consultaSQL;
    }

} 