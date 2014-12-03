<?php
class Session {

    public static function init() {
        session_start();
    }
    public static function set($clave, $valor) {
        if (!empty($clave))
            $_SESSION[$clave] = $valor;
    }

    public static function get($clave) {
        if (isset($_SESSION[$clave]))
            return $_SESSION[$clave];
    }
}