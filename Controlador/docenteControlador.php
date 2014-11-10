<?php
/**
 * Created by PhpStorm.
 * User: USUARIO
 * Date: 07/11/2014
 * Time: 07:33 PM
 */

class docenteControlador extends Controlador{

    private $_docente;
    private $table='docente';
    private $campo='Dni';
    public function __construct(){
        $this->_docente=$this->loadModelo('docente');
        parent::__construct();
    }

    public function index(){
        if(isset($_POST['dni'])){

            $datos= $this->_docente->buscar($_POST['dni'],$this->table,$this->campo);
        } else{
            $datos= $this->_docente->allDocente();
        }
        $this->_vista->docentes = $datos;
        $this->_vista->renderizar('docente');

    }

    public function seleccionarDocente(){
        $this->_docente->Nombre = @$_POST['Dni'];
        $datos= $this->_docente->selectDocente();
        $this->_vista->docente = $datos;
        $this->_vista->renderizar('docente');
    }

    public function insertarDocente(){
        $datos=$this->_docente->insertDocente();
        $this->_vista->docente=$datos;
        $this->_vista->renderizar('docente');

    }


}