<?php
	include 'conexion.php';
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
	$dicodef = $_POST["dicodef"];
	$password1 = $_POST["password1"];
	$password2 = $_POST["password2"];
	// Comprobar campos obligatorios
	if ($unidad == 'Default') {
		echo '<script>
				alert("Seleccione UCO de destino");
				window.history.back();
			  </script>';
		exit;
	}
	if ($dni == null || $dni == '') {
		echo '<script>
				alert("Introduzca un número de DNI");
				window.history.back();
			  </script>';
		exit;
	}
	if ($nombre == null || $nombre == '') {
		echo '<script>
				alert("Introduzca un nombre");
				window.history.back();
			  </script>';
		exit;
	}
	if ($apellido1 == null || $apellido1 == '') {
		echo '<script>
				alert("Introduzca su primer apellido");
				window.history.back();
			  </script>';
		exit;
	}
	if ($apellido2 == null || $apellido2 == '') {
		echo '<script>
				alert("Introduzca su segundo apellido");
				window.history.back();
			  </script>';
		exit;
	}
	if ($edad == null || $edad == '') {
		echo '<script>
				alert("Introduzca su edad");
				window.history.back();
			  </script>';
		exit;
	}
	if ($telefono == null || $telefono == '') {
		echo '<script>
				alert("Introduzca un teléfono de contacto");
				window.history.back();
			  </script>';
		exit;
	}
	if ($email == null || $email == '') {
		echo '<script>
				alert("Introduzca una dirección de correo electrónico de contacto");
				window.history.back();
			  </script>';
		exit;
	}
	if ($dicodef == null || $dicodef == '') {
		echo '<script>
				alert("Introduzca su usuario DICODEF");
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
	// Verificar requisito de edad
	if ($edad < 37) {
		echo '<script>
				alert("No cumple el requisito de edad para registrarse (+37 años)");
				window.history.back();
			  </script>';
		exit;
	}
	// Verificar si el usuario DICODEF existe ya o no
	$verificar_dicodef = mysqli_query($conexion, "SELECT * FROM militares WHERE dicodef = '$dicodef'");
	if (mysqli_num_rows($verificar_dicodef) > 0) {
		echo '<script>
				alert("El usuario ya existe");
				window.history.back();
			  </script>';
		exit;
	}
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
	// Encriptar la contraseña
	$hashed_password = password_hash($password1, PASSWORD_DEFAULT);
	// Consulta de insercion de datos de registro militar
	$insertar = "INSERT INTO militares (dicodef, password, dni, tim, cod_unidad, nombre, apellido1, apellido2, edad, telefono, direccion, codigopostal, email, nivel_estudios, idiomas, experiencia) VALUES ('$dicodef', '$hashed_password', '$dni', '$tim', '$unidad', '$nombre', '$apellido1', '$apellido2', '$edad', '$telefono', '$direccion', '$codigopostal', '$email', '$nivel_estudios', '$idiomas', '$experiencia')";
	// Ejecutar consulta
	$resultado = mysqli_query($conexion, $insertar);
	if (!$resultado) {
		echo 'Error en el registro';
	} else {
		echo '<script>
				alert("Usuario registrado con éxito");
				window.location = "../index.php";
			  </script>';
	}
	// Cerrar conexion
	mysqli_close($conexion);
?>
	
	


