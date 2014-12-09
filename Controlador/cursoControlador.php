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
        $this->_vista->ct = $this->_curso->centro();
        $this->_vista->renderizar('curso');
    }
    public function grado(){
        if($this->getInt('IdCentroEducativo'))
        echo json_encode($this->_curso->grado($this->getInt('IdCentroEducativo')));
    }

    public function getgrado(){
        $centroeducativo = $_POST["IdCentroEducativo"];
        $datos = $this->_curso->grado($centroeducativo);
        echo json_encode($datos);
    }

    public function seccion(){
        if($this->getInt('codgrado'))
        echo json_encode($this->_curso->seccion($this->getInt('codgrado')));
    }

    public function getseccion(){
        $grado = $_POST["codgrado"];
        $datoss = $this->_curso->seccion($grado);
        echo json_encode($datoss);
    }

}