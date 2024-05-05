<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "plus45";
	// Crear conexion
	$conexion = mysqli_connect($servername, $username, $password, $database);
	// Comprobar conexion
	if (!$conexion) {
	    die("CONEXION FALLIDA: ".mysqli_connect_error());
	} 
?>