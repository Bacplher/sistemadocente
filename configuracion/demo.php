<?php
//import the class
require_once('db_conn.class.php');

//save connection object to variable.
$db = dbConn::getConnection();

	$sql = $db->prepare('SELECT * FROM alumno WHERE IdAlumno= :id');

	//save result of sql query to variable.
	$result = $sql->execute( array(':id'=>'IdAlumno') );
	
//echo result
$row = $sql->fetch();
echo $row[0], $row[1], $row[2], $row[3];
/*	
*/
?>