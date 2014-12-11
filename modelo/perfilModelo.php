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
    public $Centro_Educativo;
    public $Grado;
    public $Curso;
    public $Seccion;



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
    public function agregar_da($dato){
        $consultaSQL = $this->_db->query("INSERT INTO centroeducativo VALUES ('','$this->Centro_Educativo',NULL )");
        $consultaSQL2 = $this->_db->query("INSERT INTO detalledocentecentroeducativo VALUES ($dato,(SELECT IdCentroEducativo
                                                                                                    FROM centroeducativo
                                                                                                    WHERE IdCentroEducativo
                                                                                                    ORDER BY IdCentroEducativo DESC LIMIT 1))");
        $consultaSQL3 = $this->_db->query("INSERT INTO grado VALUES ('','$this->Grado',(SELECT IdCentroEducativo
                                                                                                    FROM centroeducativo
                                                                                                    WHERE IdCentroEducativo
                                                                                                    ORDER BY IdCentroEducativo DESC LIMIT 1))");
        $consultaSQL4 = $this->_db->query("INSERT INTO seccion VALUES ('',(SELECT IdGrado
                                                                                         FROM grado
                                                                                         WHERE IdGrado
                                                                                         ORDER BY IdGrado DESC LIMIT 1),'$this->Seccion')");
        $consultaSQL5 = $this->_db->query("INSERT INTO curso VALUES ('',(SELECT IdSeccion
                                                                                         FROM seccion
                                                                                         WHERE IdSeccion
                                                                                         ORDER BY IdSeccion DESC LIMIT 1),'$this->Curso',NULL )");
    }
} 