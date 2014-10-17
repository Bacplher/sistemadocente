<?php
//import the class
require_once('db_conn.class.php');

//save connection object to variable.
$db = dbConn::getConnection();

//query database using prepared statement
//sql
$sql = $db->prepare('SELECT * FROM docente WHERE Nombre = :id');

//save result of sql query to variable.
$result = $sql->execute( array(':id' => 'SARA MARTINA') );



//echo result
$row = $sql->fetch();
for ($i=0; $i < count($result) ; $i++) {
    echo $row[$i].'-';
}
/*
  foreach($datos as $row){
  		echo $row['IdAlumno'];
  		echo $row['Nombre'];
  		echo $row['ApellidoPaterno'];
   }
*/

?>
