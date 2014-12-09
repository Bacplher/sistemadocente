<?php

class indexControlador extends Controlador
{

    private $_docentes;
    public $table = 'docente';

    public function __construct()
    {
        parent::__construct();
        $this->_docentes = $this->loadModelo('index');
    }

    public function index()
    {
        $this->_vista->renderizar('index');
        if (@$_POST["guardar"] == '1') {
            //$this->_docentes->Dni = @$_POST['Dni'];
            // $this->_docentes->Contrasena = @$_POST['Contraseña'];
            //$datos=$this->_docentes->Login();
            // $datos = $this->_docentes->Login($this->table, $_REQUEST['Dni'], $_REQUEST['Contraseña']);
            $datos = $this->_docentes->Login($this->table, $_POST['Dni'],$_POST['Clave']);
            //$this->_vista->index = $datos;
            //$datos1 =$_POST['Numero'];
            if ($datos == null) {
                echo '<script>alert("Usuario o Clave Incorrecta")</script>';
                $this->_vista->action = BASE_URL . 'index';

            } else {
                $this->_vista->action = BASE_URL . 'alumno';
                Session::set('autenticado', true);
                Session::set('IdDocente', $datos[0]['IdDocente']);
                Session::set('Nombre', $datos[0]['Nombre'] . ' ' . $datos[0]['ApellidoPaterno']. ' ' . $datos[0]['ApellidoMaterno']);
                $this->redireccionar('perfil');
                //session::set('perfil', $datos[0]['PERFIL']);
                //session::set('idperfil', $datos[0]['IDPERFIL']);
            }
        }
    }
    public function mostrar() {
        echo 'Nombre: ' . Session::get('Nombre') . '<br>';
        //echo 'Perfil: ' . session::get('perfil') . '<br>';
    }

    public function cerrar() {
        Session::destroy();
        echo '<script>alert("Sesion finalizada")</script>';
        $this->redireccionar();
    }
}

?>
