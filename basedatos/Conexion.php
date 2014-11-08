<?php


class Conexion extends PDO
{

    protected static $host = 'localhost';
    protected static $user = 'root';
    protected static $pass = '';
    protected static $namedatabase = 'sistemadocente';
    protected static $char = 'utf8';

    public function __construct()
    {
        parent::__construct(
            'mysql:host=' . DB_HOST .
            ';dbname=' . DB_NAME,
            DB_USER,
            DB_PASS,
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . DB_CHAR
            ));

    }
}
 