<?php

class Vista{
    private $_js;
    private $_css;
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
//        MODIFICACION
        if(is_readable($rutaVista)){
            if($rutaVista==ROOT . 'vista' . DS . 'index' . DS . 'index.php')  {
                include_once ROOT . 'vista' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'logo.php';
                include_once $rutaVista;
            }
            else{
                include_once ROOT . 'vista' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
                include_once $rutaVista;
                include_once ROOT . 'vista' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
            }
        }
        else {
            throw new Exception ('Error de vista');
        }
    }

    public function setJs(array $js) {
        if (is_array($js) && count($js)) {
            for ($i = 0; $i < count($js); $i++) {
                $this->_js[] = BASE_URL . 'vista/' . $this->_controlador . "/js/" . $js[$i] . '.js';
            }
        } else {
            throw new Exception('Error de js');
        }
    }

    public function setCss(array $css) {
        if (is_array($css) && count($css)) {
            for ($i = 0; $i < count($css); $i++) {
                $this->_css[] = BASE_URL . 'vista/' . $this->_controlador . "/css/" . $css[$i] . '.css';
            }
        } else {
            throw new Exception('Error de css');
        }
    }

}