<?php

class consultas {

    public function all($tabla){
        $db = new conexion();
        $consultaall = "SELECT * FROM $tabla";
        $sql=$db->prepare($consultaall);
        $resultado=$sql->execute();
        $db->cerrar();
        return $sql->fetchAll();
    }

    public function select($tabla,$campo,$valores){
        $db = new conexion();
        $consultaselect = "SELECT * FROM $tabla WHERE $campo = '$valores'";
        $sql=$db->prepare($consultaselect);
        $resultado= $sql->execute();
        $db->cerrar();
        return $sql->fetchAll();
    }

    public function buscar($search,$tabla,$campo){
        $db = new conexion();
        $consultaselect = "SELECT * FROM $tabla WHERE $campo LIKE '%$search%'";
        $sql=$db->prepare($consultaselect);
        $resultado= $sql->execute();
        $db->cerrar();
        return $sql->fetchAll();
    }

    public function insert($tabla,$nombre,$apellidopaterno,$apellidomaterno,$email){
        $db = new conexion();
        $consultainsert = "INSERT INTO $tabla VALUES ('','$nombre','$apellidopaterno','$apellidomaterno','$email')";

        $sql=$db->prepare($consultainsert);
        $resultado=$sql->execute();
        $db->cerrar();
        return $sql->fetchAll();
}
} 