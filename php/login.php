<?php
	include 'conexion.php';
	error_reporting(0); // quitar errores de PHP
	// Guardar los datos de inicio en variables
	$usuario = $_POST["usuario"];
	$password = $_POST["password"];
	// Consultar usuario MILITAR y EMPRESA y contraseña
	$verificar_dicodef = mysqli_query($conexion, "SELECT * FROM militares WHERE dicodef = '$usuario'");
	$fila_militar = $verificar_dicodef->fetch_array(MYSQLI_ASSOC);
	$hashed_password_militar = $fila_militar['password'];
	$verificar_empresa = mysqli_query($conexion, "SELECT * FROM empresas WHERE cif = '$usuario'");
	$fila_empresa = $verificar_empresa->fetch_array(MYSQLI_ASSOC);
	$hashed_password_empresa = $fila_empresa['password'];
	// Comprobar si es usuario MILITAR o EMPRESA y si contraseña correcta
	if (mysqli_num_rows($verificar_dicodef) > 0 && password_verify($password, $hashed_password_militar)) {
		session_start();
		$_SESSION['usuario'] = $usuario;
		if ($usuario == 'admin') {
			header("Location:inicio_admin.php");
		} else {
			header("Location:inicio_militar.php");
		}		
		exit;
	} elseif (mysqli_num_rows($verificar_empresa) > 0 && password_verify($password, $hashed_password_empresa)) {
		session_start();
		$_SESSION['usuario'] = $usuario;
		header("Location:inicio_empresa.php");
		exit;
	} else {
		echo '<script>
				alert("El usuario no existe o la contraseña es incorrecta");
				window.history.back();
			  </script>';
	}
?>