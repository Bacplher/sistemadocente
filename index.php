<?php 

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)). DS);
define('APP_PATH', ROOT. 'Aplicacion' . DS);

require_once APP_PATH .'Config.php';
require_once APP_PATH .'Bootstrap.php';
require_once APP_PATH .'Controlador.php';
require_once APP_PATH .'Modelo.php';
require_once APP_PATH .'Registro.php';
require_once APP_PATH .'Request.php';
require_once APP_PATH .'Vista.php';

try {
Bootstrap::run(new Request());    
} catch (Exception $e) {
 echo $e->getMessage();  
}


?>