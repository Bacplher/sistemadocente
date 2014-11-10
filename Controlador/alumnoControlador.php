    <?php

    class alumnoControlador extends Controlador
    {
        private $_alumno;
        private $table='alumno';
        private $campo='Nombre';

        public function __construct()
        { $this->_alumno = $this->loadModelo('alumno');
            parent::__construct();
        }

        public function index()
        {
            if(isset($_POST['nombrealumno'])){
                $datos= $this->_alumno->buscar($_POST['nombrealumno'],$this->table,$this->campo);
            }else{
                $datos= $this->_alumno->allAlumno();
            }
            $this->_vista->alumnos = $datos;
            $this->_vista->renderizar('alumno');
        }

        public function nuevo()
        {
            if (@$_POST["guardar"] == '1') {
                $this->_alumno->Nombre = @$_POST['Nombre'];
                $this->_alumno->ApellidoPaterno = @$_POST['ApellidoPaterno'];
                $this->_alumno->ApellidoMaterno = @$_POST['ApellidoMaterno'];
                $this->_alumno->Email = @$_POST['Email'];
                $this->_alumno->insertar();
                $this->redireccionar('alumno');
            }


            $nuevo = $this->loadModelo('alumno');
            $this->_vista->action = BASE_URL . 'alumno/nuevo';
            $this->_vista->titulo = 'Ingresar Alumno';
            $this->_vista->renderizar('form');

        }

        public function eliminar($id)
        {
            if (!$this->filtrarInt($id)) {
                $this->redireccionar('alumno');
            }
            $this->_alumno->IdAlumno = $this->filtrarInt($id);
            $this->_alumno->getEliminar();
            $this->redireccionar('alumno');
        }
        

        public function editar($id)
        {
            if (!$this->filtrarInt($id)) {
                $this->redireccionar('alumno');
            }
            if (@$_POST["guardar"] == '1') {
                $this->_alumno->IdAlumno = $this->filtrarInt($id);
                $this->_alumno->Nombre = @$_POST['Nombre'];
                $this->_alumno->ApellidoPaterno = @$_POST['ApellidoPaterno'];
                $this->_alumno->ApellidoMaterno = @$_POST['ApellidoMaterno'];
                $this->_alumno->Email = @$_POST['Email'];

                $this->_alumno->getActualizar();
                $this->redireccionar('alumno');
            }

            $this->_vista->titulo = "Actualizar Alumno";
            $this->_vista->renderizar('form');

        }
    }
