<?php

class conexion extends PDO
{
    private $instancia = null;
    public static $_servidor = null;
    private $driver = "mysql";
    private $database = "sistemadocente";
    private $host =  "localhost";
    private $puerto = "3306";
    private $usuario = "root";
    private $password = "";

    public function __construct()
    {
        if (!is_null($this->instancia)) {
            return self::$instancia;
        }
        $dsn = $this->driver . ':dbname=' . $this->database . '; host=' . $this->host . '; port=' . $this->puerto;
        $password = trim($this->password);
        try {
            $this->instancia = parent::__construct($dsn, $this->usuario, $password,array(
                PDO::ATTR_PERSISTENT => true
            ));
            return $this->instancia;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function cerrar()
    {
        $this->instancia = null;

}
}