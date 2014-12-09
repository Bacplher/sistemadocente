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
        $datos= $this->_curso->curso();
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

}