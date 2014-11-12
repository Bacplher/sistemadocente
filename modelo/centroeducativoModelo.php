<?php
class centroeducativoModelo extends Consulta{
    public $table = 'centroeducativo';

    public function centroEducativo()
    {
        $consultaSQL = $this->Select($this->table);
        return $consultaSQL;
    }
}