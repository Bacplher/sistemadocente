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
        $this->_vista->renderizar('curso');
    }


}