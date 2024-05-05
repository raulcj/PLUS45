<?php
	$servername = "192.168.10.3";
	$username = "root";
	$password = "root";
	$database = "Plus45";
	// Crear conexion
	$conexion = mysqli_connect($servername, $username, $password, $database);
	// Comprobar conexion
	if (!$conexion) {
	    die("CONEXION FALLIDA: ".mysqli_connect_error());
	} 
?>