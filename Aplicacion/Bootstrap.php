<?php

class Bootstrap
{
    public static function run(Request $peticion)
    {
        $controlador = $peticion->getControlador() . 'Controlador';
        $rutaControlador = ROOT . 'Controlador' . DS . $controlador . '.php';
        $metodo = $peticion->getMetodo();
        $args = $peticion->getArgs();

        if (is_readable($rutaControlador)) {
            require_once $rutaControlador;
            $controlador = new $controlador;

            if (is_callable(array($controlador, $metodo))) {
                $metodo = $metodo = $peticion->getMetodo();
            } else {
                $metodo = 'index';
            }

            if (isset($args)) {
                call_user_func_array(array($controlador, $metodo), $peticion->getArgs());
            } else {
                call_user_func(array($controlador, $metodo));
            }

        } else {
            throw new Exception('No encontrado ');
        }
    }
}
