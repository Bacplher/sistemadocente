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
        $datos= $this->_perfil->perfilDocente_dp(Session::get('IdDocente'));
        $this->_vista->perfil = $datos;
        $this->_vista->datos_academicos =$this->_perfil->perfildocente_ia(Session::get('IdDocente'));
        $this->_vista->renderizar('perfil');
    }

    public function actualizar(){
        //$info =  array();
        $this->_perfil->Nombre=$_POST['Nombre'];
        $this->_perfil->ApellidoPaterno=$_POST['ApellidoPaterno'];
        $this->_perfil->ApellidoMaterno=$_POST['ApellidoMaterno'];
        $this->_perfil->Edad=$_POST['Edad'];
        $this->_perfil->Celular=$_POST['Celular'];
        $this->_perfil->Email=$_POST['Email'];
        $this->_perfil->Sexo=$_POST['Sexo'];
        $this->_perfil->Dni=$_POST['Dni'];
        $this->_perfil->Clave=$_POST['Clave'];
        $this->_perfil->Especialidad=$_POST['Especialidad'];
        $this->_perfil->acualizarPerfil(Session::get('IdDocente'));

        //foreach($data as $key => $item){
         //   $info[$key] = $item;
        //}
         //echo json_encode($this->_perfil->Nombre=$_POST['Nombre']);
         //echo json_encode($this->_perfil->Clave=$_POST['Clave']);



    }

    public function agregar(){
        $this->_perfil->Centro_Educativo=$_POST['Centro_Educativo'];
        $this->_perfil->Grado=$_POST['Grado'];
        $this->_perfil->Curso=$_POST['Curso'];
        $this->_perfil->Seccion=$_POST['Seccion'];
        $this->_perfil->agregar_da(Session::get('IdDocente'));

    }

}