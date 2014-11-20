<?php
/**
 * Created by PhpStorm.
 * User: USUARIO
 * Date: 13/11/2014
 * Time: 12:01 AM
 */

class perfilControlador extends Controlador {

    private $_perfil;


    public function __construct()
    {
        parent::__construct();
        $this->_perfil = $this->loadModelo('perfil');
    }
    public function index()
    {
        $datos= $this->_perfil->perfilDocente();
        $this->_vista->perfil = $datos;
        $this->_vista->renderizar('perfil');
    }


} 