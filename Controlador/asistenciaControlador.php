<?php
class asistenciaControlador extends Controlador{

    private $_asistencia;


    public function __construct()
    {
        parent::__construct();
        $this->_asistencia = $this->loadModelo('asistencia');
    }
    public function index()
    {
        $datos= $this->_asistencia->curso1();
        $this->_vista->asistencia = $datos;
        $this->_vista->ct = $this->_asistencia->centro(Session::get('IdDocente'));
        $this->_vista->renderizar('asistencia');
    }
    public function grado(){
        if($this->getInt('IdCentroEducativo'))
            echo json_encode($this->_asistencia->grado($this->getInt('IdCentroEducativo'),Session::get('IdDocente')));
    }

    public function getgrado(){
        $centroeducativo = $_POST["IdCentroEducativo"];
        $datos = $this->_asistencia->grado($centroeducativo,Session::get('IdDocente'));
        echo json_encode($datos);
    }
    public function clase(){
        if($this->getInt('codclase'))
            echo json_encode($this->_asistencia->clase($this->getInt('codclase'),Session::get('IdDocente')));
    }

    public function getclase(){
        $clase = $_POST["codclase"];
        $datoss = $this->_asistencia->clase($clase,Session::get('IdDocente'));
        echo json_encode($datoss);
    }
    public function seccion(){
        if($this->getInt('codgrado'))
            echo json_encode($this->_asistencia->seccion($this->getInt('codgrado'),Session::get('IdDocente')));
    }

    public function getseccion(){
        $grado = $_POST["codgrado"];
        $datoss = $this->_asistencia->seccion($grado,Session::get('IdDocente'));
        echo json_encode($datoss);
    }

    public function curso(){
        if($this->getInt('codseccion'))
            echo json_encode($this->_asistencia->curso($this->getInt('codseccion'),Session::get('IdDocente')));
    }

    public function getcurso(){
        $seccion = $_POST["codseccion"];
        $da = $this->_asistencia->curso($seccion,Session::get('IdDocente'));
        echo json_encode($da);
    }
    public function getalumnos(){
        $asistencia = $_POST["codcurso"];
        $alumnos1 = $this->_asistencia->alumnos($asistencia);
        echo json_encode($alumnos1);
    }
    public function eliminaralumno(){
        $codalumno = $_POST["codalumno"];
        $dalumno = $this->_asistencia->deletealumno($codalumno);
        echo json_encode($dalumno);
    }

    public function insertaralumno(){
        $parametro = $_POST["param"];
        return $parametro;
    }
}
