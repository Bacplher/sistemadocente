<?php
require_once '/basedatos/db_conn.class.php';
$nombre = $_POST['nombre'];
$dni = $_POST['dni'];


//save connection object to variable.
$db = dbConn::getConnection();

//query database using prepared statement
//sql
$sql1 = $db->prepare( "SELECT Dni FROM docente WHERE Dni LIKE '$dni'");
$sql2 = $db->prepare( "SELECT Nombre FROM docente WHERE Nombre LIKE '$nombre'");

//save result of sql query to variable.
$resultado1 = $sql1->execute();
$resultado2 = $sql2->execute();
$row1 = $sql1->fetch();
$row2 = $sql2->fetch();

if ($row1[0]==null or $row2[0]==null or $row1[0]<>$dni or $row2[0]<>$nombre ){
    header('Location: index.html');
}else{
    header('Location: modelo/modelo.php');
}
/*
$nombre = $_POST['nombre'];
if ($nombre == 'hernan') {
	echo $nombre;
}
else {
    header('Location: index.html');
}*/
