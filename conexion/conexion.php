<?php
	$mysqli = new mysqli('127.0.0.1', 'root', '123', 'obra');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);	
	}
?>