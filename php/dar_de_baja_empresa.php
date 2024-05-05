<?php
	include 'conexion.php';
	session_start();
	// error_reporting(0); // quitar error de PHP
	// Comprobacion de inicio de sesion
	$varempresa = $_SESSION['usuario'];
	if ($varempresa == null || $varempresa == '') {
		echo 'No tiene autorización para iniciar sesión';
		die();
	}
	// Borrar registro y comprobar
	$borrar_empresa = mysqli_query($conexion, "DELETE FROM empresas WHERE cif = '$varempresa'");
	$verificar_empresa = mysqli_query($conexion, "SELECT * FROM empresas WHERE cif = '$varempresa'");

	if (mysqli_num_rows($verificar_empresa) == 0) {
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