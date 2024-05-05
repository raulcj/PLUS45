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
	// Guardar los datos de registro y almacenarlos en variables
	$unidad = $_POST["unidad"];
	$dni = $_POST["dni"];
	$tim = $_POST["tim"];
	$nombre = $_POST["nombre"];
	$apellido1 = $_POST["apellido1"];
	$apellido2 = $_POST["apellido2"];
	$edad = $_POST["edad"];
	$telefono = $_POST["telefono"];
	$direccion = $_POST["direccion"];
	$codigopostal = $_POST["codigopostal"];
	$email = $_POST["email"];
	$nivel_estudios = $_POST["nivel_estudios"];
	$idiomas = $_POST["idiomas"];
	$experiencia = $_POST["experiencia"];
	$password1 = $_POST["password1"];
	$password2 = $_POST["password2"];
	// Verificar si el DNI existe ya o no
	$verificar_dni = mysqli_query($conexion, "SELECT * FROM militares WHERE dni = '$dni'");
	if (mysqli_num_rows($verificar_dni) > 0) {
		echo '<script>
				alert("El número de DNI ya existe");
				window.history.back();
			  </script>';
		exit;
	}
	// Verificar si el TIM existe ya o no
	if ($tim != null || $tim != '') {
		$verificar_tim = mysqli_query($conexion, "SELECT * FROM militares WHERE tim = '$tim'");
		if (mysqli_num_rows($verificar_tim) > 0) {
			echo '<script>
					alert("El número de TIM ya existe");
					window.history.back();
				  </script>';
			exit;
		}
	}
	// Verificar si el email esta ya registrado o no
	$verificar_email = mysqli_query($conexion, "SELECT * FROM militares WHERE email = '$email'");
	if (mysqli_num_rows($verificar_email) > 0) {
		echo '<script>
				alert("El email ya existe");
				window.history.back();
			  </script>';
		exit;
	}
	// Verificar si el telefono esta ya registrado o no
	$verificar_telefono = mysqli_query($conexion, "SELECT * FROM militares WHERE telefono = '$telefono'");
	if (mysqli_num_rows($verificar_telefono) > 0) {
		echo '<script>
				alert("El teléfono ya existe");
				window.history.back();
			  </script>';
		exit;
	}
	// Verificar requisito de edad
	if ($edad < 37) {
		echo '<script>
				alert("No cumple el requisito de edad para registrarse (+37 años)");
				window.history.back();
			  </script>';
		exit;
	}
	// Comprobar campos obligatorios
	if ($unidad == 'Default') {
		echo '<script>
				alert("Seleccione UCO de destino");
				window.history.back();
			  </script>';
		exit;
	}
	if ($password1 == null || $password1 == '') {
		echo '<script>
				alert("Introduzca una contraseña de usuario");
				window.history.back();
			  </script>';
		exit;
	}
	if ($password2 == null || $password2 == '') {
		echo '<script>
				alert("Vuelva a introducir su contraseña de usuario");
				window.history.back();
			  </script>';
		exit;
	}
	if ($password1 != $password2) {
		echo '<script>
				alert("Las contraseñas introducidas no coinciden");
				window.history.back();
			  </script>';
		exit;
	}
	// Si campo vacio entonces cargar el anterior
	if ($dni == null || $dni == '') {
		$buscar_dni = mysqli_query($conexion, "SELECT dni FROM militares WHERE dicodef = '$vardicodef'");
		$fila = $buscar_dni->fetch_array(MYSQLI_ASSOC);
		$dni = $fila['dni'];
	}
	if ($tim == null || $tim == '') {
		$buscar_tim = mysqli_query($conexion, "SELECT tim FROM militares WHERE dicodef = '$vardicodef'");
		$fila = $buscar_tim->fetch_array(MYSQLI_ASSOC);
		$tim = $fila['tim'];
	}
	if ($nombre == null || $nombre == '') {
		$buscar_nombre = mysqli_query($conexion, "SELECT nombre FROM militares WHERE dicodef = '$vardicodef'");
		$fila = $buscar_nombre->fetch_array(MYSQLI_ASSOC);
		$nombre = $fila['nombre'];
	}
	if ($apellido1 == null || $apellido1 == '') {
		$buscar_apellido1 = mysqli_query($conexion, "SELECT apellido1 FROM militares WHERE dicodef = '$vardicodef'");
		$fila = $buscar_apellido1->fetch_array(MYSQLI_ASSOC);
		$apellido1 = $fila['apellido1'];
	}
	if ($apellido2 == null || $apellido2 == '') {
		$buscar_apellido2 = mysqli_query($conexion, "SELECT apellido2 FROM militares WHERE dicodef = '$vardicodef'");
		$fila = $buscar_apellido2->fetch_array(MYSQLI_ASSOC);
		$apellido2 = $fila['apellido2'];
	}
	if ($edad == null || $edad == '') {
		$buscar_edad = mysqli_query($conexion, "SELECT edad FROM militares WHERE dicodef = '$vardicodef'");
		$fila = $edad->fetch_array(MYSQLI_ASSOC);
		$edad = $fila['edad'];
	}
	if ($telefono == null || $telefono == '') {
		$buscar_telefono = mysqli_query($conexion, "SELECT telefono FROM militares WHERE dicodef = '$vardicodef'");
		$fila = $buscar_telefono->fetch_array(MYSQLI_ASSOC);
		$telefono = $fila['telefono'];
	}
	if ($direccion == null || $direccion == '') {
		$buscar_direccion = mysqli_query($conexion, "SELECT direccion FROM militares WHERE dicodef = '$vardicodef'");
		$fila = $buscar_direccion->fetch_array(MYSQLI_ASSOC);
		$direccion = $fila['direccion'];
	}
	if ($codigopostal == null || $codigopostal == '') {
		$buscar_codigopostal = mysqli_query($conexion, "SELECT codigopostal FROM militares WHERE dicodef = '$vardicodef'");
		$fila = $buscar_codigopostal->fetch_array(MYSQLI_ASSOC);
		$codigopostal = $fila['codigopostal'];
	}
	if ($email == null || $email == '') {
		$buscar_email = mysqli_query($conexion, "SELECT email FROM militares WHERE dicodef = '$vardicodef'");
		$fila = $buscar_email->fetch_array(MYSQLI_ASSOC);
		$email = $fila['email'];
	}
	if ($nivel_estudios == null || $nivel_estudios == '') {
		$buscar_nivel_estudios = mysqli_query($conexion, "SELECT nivel_estudios FROM militares WHERE dicodef = '$vardicodef'");
		$fila = $buscar_nivel_estudios->fetch_array(MYSQLI_ASSOC);
		$nivel_estudios = $fila['nivel_estudios'];
	}
	if ($idiomas == null || $idiomas == '') {
		$buscar_idiomas = mysqli_query($conexion, "SELECT idiomas FROM militares WHERE dicodef = '$vardicodef'");
		$fila = $buscar_idiomas->fetch_array(MYSQLI_ASSOC);
		$idiomas = $fila['idiomas'];
	}
	if ($experiencia == null || $experiencia == '') {
		$buscar_experiencia = mysqli_query($conexion, "SELECT experiencia FROM militares WHERE dicodef = '$vardicodef'");
		$fila = $buscar_experiencia->fetch_array(MYSQLI_ASSOC);
		$experiencia = $fila['experiencia'];
	}
	// Encriptar la contraseña
	$hashed_password = password_hash($password1, PASSWORD_DEFAULT);
	// Consulta de actualizacion de datos de registro militar
	$actualizar = "UPDATE militares SET password = '$hashed_password', dni = '$dni', tim = '$tim', cod_unidad = '$unidad', nombre = '$nombre', apellido1 = '$apellido1', apellido2 = '$apellido2', edad = '$edad', telefono = '$telefono', direccion = '$direccion', codigopostal = '$codigopostal', email = '$email', nivel_estudios = '$nivel_estudios', idiomas = '$idiomas', experiencia = '$experiencia' WHERE dicodef = '$vardicodef'";
	// Comprobar consulta
	$resultado = mysqli_query($conexion, $actualizar);
	if (!$resultado) {
		echo 'Error al modificar los datos de usuario';
	} else {
		echo '<script>
				alert("Se han modificado los datos de usuario");
				window.history.go(-2);
			  </script>';
	}
	// Cerrar conexion
	mysqli_close($conexion);
?>
	
	



	
	



	
	


