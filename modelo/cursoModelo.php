<?php
class cursoModelo extends Consulta{
    public $table = 'curso';

    public function curso()
    {
        $consultaSQL = $this->Select($this->table);
        return $consultaSQL;
    }
}