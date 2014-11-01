
<html>
<head>
<title>Docente</title>

<!-- paste this code into your webpage -->
<link href="../vista/layout/default/css/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="../vista/layout/default/js/tablecloth.js"></script>
<!-- end -->

<style>

body{
	margin:0;
	padding:0;
	background:#f1f1f1;
	font:70% Arial, Helvetica, sans-serif;
	color:#555;
	line-height:150%;
	text-align:left;
}
a{
	text-decoration:none;
	color:#057fac;
}
a:hover{
	text-decoration:none;
	color:#999;
}
h1{
	font-size:140%;
	margin:0 20px;
	line-height:80px;
}
h2{
	font-size:120%;
}
#container{
	margin:0 auto;
	width:900px;
	background:#fff;
	padding-bottom:20px;
}
#content{margin:0 10px;}
p.sig{
	margin:0 auto;
	width:680px;
	padding:1em 0;
}
form{
	margin:1em 0;
	padding:.2em 20px;
	background:#eee;
}
</style>

</head>

<body>
<div id="container">
<center><h1>Lista de Docentes</h1></center>
	<div id="content">
<?php
//import the class
require_once '../basedatos/db_conn.class.php';

//save connection object to variable.
$db = dbConn::getConnection();

//query database using prepared statement
//sql
$sql = $db->query('SELECT * FROM docente');

//save result of sql query to variable.
//$result = $sql->execute( array(':id' => 'SARA MARTINA') );



//echo result
$sql->setFetchMode(PDO::FETCH_ASSOC);
 echo "<table class='rwd-table'>";
 		echo"<tr>";
 		echo"<td>Id Docente</td>";
 		echo"<td>Nombre</td>";
 		echo"<td>Apellido Paterno</td>";
 		echo"<td>Apellido Materno</td>";
 		echo"<td>Celular</td>";
 		echo"<td>Email</td>";
 		echo"<td>Edad</td>";
 		echo"<td>Sexo</td>";
 		echo"<td>DNI</td>";
 		echo"<td>Contraseña</td>";
    while($resultado = $sql->fetch()){
        echo "<tr>";
        foreach ($resultado as $valor) {
            echo "<td bgcolor='#eaf8fc'>$valor</td>";
        }
        echo "</tr>";

    }
	echo "</table>";

?>
</div>
</div>
</body>
	<a href="../index.html">Cerrar Sesion</a>
</html>