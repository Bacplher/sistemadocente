<?php
class cursoControlador extends Controlador{

    private $_curso;


    public function __construct()
    {
        parent::__construct();
        $this->_curso = $this->loadModelo('curso');
    }
    public function index()
    {
        $datos= $this->_curso->curso1();
        $this->_vista->curso = $datos;
        $this->_vista->ct = $this->_curso->centro(Session::get('IdDocente'));
        $this->_vista->renderizar('curso');
    }
    public function grado(){
        if($this->getInt('IdCentroEducativo'))
        echo json_encode($this->_curso->grado($this->getInt('IdCentroEducativo'),Session::get('IdDocente')));
    }

    public function getgrado(){
        $centroeducativo = $_POST["IdCentroEducativo"];
        $datos = $this->_curso->grado($centroeducativo,Session::get('IdDocente'));
        echo json_encode($datos);
    }

    public function seccion(){
        if($this->getInt('codgrado'))
        echo json_encode($this->_curso->seccion($this->getInt('codgrado'),Session::get('IdDocente')));
    }

    public function getseccion(){
        $grado = $_POST["codgrado"];
        $datoss = $this->_curso->seccion($grado,Session::get('IdDocente'));
        echo json_encode($datoss);
    }

    public function curso(){
        if($this->getInt('codseccion'))
        echo json_encode($this->_curso->curso($this->getInt('codseccion'),Session::get('IdDocente')));
    }

    public function getcurso(){
        $seccion = $_POST["codseccion"];
        $da = $this->_curso->curso($seccion,Session::get('IdDocente'));
        echo json_encode($da);
    }
    public function getalumnos(){
        $curso = $_POST["codcurso"];
        $alumnos1 = $this->_curso->alumnos($curso);
        echo json_encode($alumnos1);
    }
    public function eliminaralumno(){
        $codalumno = $_POST["codalumno"];
        $dalumno = $this->_curso->deletealumno($codalumno);
        echo json_encode($dalumno);
    }

    public function insertaralumno(){
        $parametro = $_POST["param"];
        return $parametro;
    }
}