<?php

//import the class
require_once '../configuracion/db_conn.class.php';

//save connection object to variable.
$db = dbConn::getConnection();

//query database using prepared statement
//sql
$datos = $db->query('SELECT * FROM docente');

//save result of sql query to variable.
//$result = $sql->execute( array(':id' => 'SARA MARTINA') );



//echo result

$datos->setFetchMode(PDO::FETCH_ASSOC);
 echo "<table border='1'>";
    while($result = $datos->fetch()){
        echo "<tr>";
        foreach ($result as $col_value) {
            echo "<td>$col_value</td>";
        }
        echo "</tr>";

    }
	echo "</table>";

?>


