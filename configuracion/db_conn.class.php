<?php

//db clase de conexión con el patrón singleton
class dbConn{
	
	//variable para contener el objeto de conexión 
	protected static $db;
		
	private function __construct() {
		
			try {
				// asignar objeto PDO a db variables
				self::$db = new PDO( 'mysql:host=localhost;dbname=sistemadocente', 'root','' );
				self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			}
			catch (PDOException $e) {
				echo "Error al conectarse con la base de datos: ".$e->getMessage();
			}
		
	}
	
	// get connection function.
	public static function getConnection() {
		
		//if connection doesnt exist already, create one.
		if (!self::$db) {
			new dbConn();
		}
		
		//return connection.
		return self::$db;
	}
	

	}
	
?>