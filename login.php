<?php
require_once '/basedatos/db_conn.class.php';
$nombre = $_POST['nombre'];
$dni = $_POST['dni'];

//save connection object to variable.
$db = dbConn::getConnection();

//query database using prepared statement
//sql
$sql1 = $db->query('SELECT Nombre FROM docente WHERE Nombre="$nombre"');
$sql2 = $db->query('SELECT Dni FROM docente WHERE Nombre="$dni" ');

//save result of sql query to variable.
$result1 = $sql1->execute();
$result2 = $sql2->execute();
if ($result1==$nombre AND $result2==$dni) {
    header('Location: modelo/modelo.php');
}
else{
    header('Location: index.html');
}
/*
$nombre = $_POST['nombre'];
if ($nombre == 'hernan') {
	echo $nombre;
}
else {
    header('Location: index.html');
}*/
