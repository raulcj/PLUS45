<?php
	include 'conexion.php';
	session_start();
	// error_reporting(0); // quitar error de PHP
	// Comprobacion de inicio de sesion
	$vardicodef = $_SESSION['usuario'];
	if ($vardicodef == null || $vardicodef == '') {
		echo 'No tiene autorización para iniciar sesión';
		die();
	}
	// Borrar registro y comprobar
	$borrar_dicodef = mysqli_query($conexion, "DELETE FROM militares WHERE dicodef = '$vardicodef'");
	$verificar_dicodef = mysqli_query($conexion, "SELECT * FROM militares WHERE dicodef = '$vardicodef'");

	if (mysqli_num_rows($verificar_dicodef) == 0) {
		session_destroy();
		echo '<script>
				alert("Usuario eliminado correctamente");
				window.location = "../index.php";
			  </script>';  
		exit;
	} else {
		echo 'No se ha eliminado el usuario';
	}
	// Cerrar conexion
	mysqli_close($conexion);
?>