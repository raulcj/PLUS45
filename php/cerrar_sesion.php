<?php
	session_start();
	error_reporting(0); // no mostrar errores de PHP
	// Comprobacion de inicio de sesion
	$varsesion = $_SESSION['usuario'];
	if ($varsesion == null || $varsesion = '') {
		echo 'No tiene autorización para iniciar sesión';
		die();
	}
	// Terminar la sesion
	session_destroy();
	header("Location:../index.php");
?>