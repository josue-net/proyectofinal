<?php 
	
	$host = 'localhost';
	$user = 'root';
	$password = '12345678';
	$db = 'logtest';
	$port= 3360;

	$conection = @mysqli_connect($host,$user,$password,$db,$port);

	if(!$conection){
		echo "Error en la conexión";
	}

?>