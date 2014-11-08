<?php

class indexControlador extends Controlador
{

    private $_docentes;

    public function __construct()
    {
        parent::__construct();
        $this->_docentes = $this->loadModelo('index');
    }

    public function index()
    {
        $this->_docentes->Dni = @$_POST['Dni'];
        $this->_docentes->Contraseña = @$_POST['Contraseña'];
        $datos = $this->_docentes->getLogin();
        $this->_vista->renderizar('index');
        if ($datos == null) {
            $this->_vista->renderizar('index');
            //echo '<script type="text/javascript">alert("usuario o clave incorrecta")</script>';

        } else {
            echo '<script type="text/javascript">alert("Datos Correctos")</script>';
            $this->redireccionar('alumno');
        }


    }

}

?>
