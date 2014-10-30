<?php

class Vista{
    private $_controlador;
    public function __construct(Request $peticion) {
        $this->_controlador = $peticion->getControlador();
    }
    
    public function renderizar($vista, $item = false){
        $menu = array(
            array(
                'id' => 'inicio',
                'titulo' => 'Inicio',
                'enlace' => BASE_URL
            ),
            
            array(
                'id' => 'perfil',
                'titulo' => 'Perfil',
                'enlace' => BASE_URL
            ),
            array(
                'id' => 'cursos',
                'titulo' => 'Cursos',
                'enlace' => BASE_URL
            ),
            array(
                'id' => 'reportes',
                'titulo' => 'Reportes',
                'enlace_titulo' => BASE_URL
            )
        );
        
        
        $_layoutParams = array(
            'ruta_css' => BASE_URL . 'vista/layout/' . DEFAULT_LAYOUT . '/css/' ,
            'ruta_img' => BASE_URL . 'vista/layout/' . DEFAULT_LAYOUT . '/img/' ,
            'ruta_js' => BASE_URL . 'vista/layout/' . DEFAULT_LAYOUT . '/js/' ,
            'menu' => $menu
        );
        $rutaVista = ROOT . 'vista' . DS .$this->_controlador . DS . $vista . '.php';
        
        if(is_readable($rutaVista)){
            include_once ROOT . 'vista' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
            include_once $rutaVista;
            include_once ROOT . 'vista' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        }
        else {
            throw new Exception ('Error de vista');
        }
    }
}