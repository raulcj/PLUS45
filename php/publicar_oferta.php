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
	// Guardar los datos de registro y almacenarlos en variables
	$ambito_profesional = $_POST["ambito_profesional"];
	$descripcion = $_POST["descripcion"];
	$password1 = $_POST["password1"];
	$password2 = $_POST["password2"];
	// Comprobar campos obligatorios
	if ($ambito_profesional == 'Default') {
		echo '<script>
				alert("Seleccione un ámbito profesional de puesto");
				window.history.back();
			  </script>';
		exit;
	}
	if ($descripcion == null || $descripcion == '') {
		echo '<script>
				alert("Introduzca una descripción del puesto");
				window.history.back();
			  </script>';
		exit;
	}
	// Comprobar campos obligatorios
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
	// Verificar password
	$verificar_password = mysqli_query($conexion, "SELECT * FROM empresas WHERE cif = '$varempresa'");
	$fila = $verificar_password->fetch_array(MYSQLI_ASSOC);
	$hashed_password = $fila['password'];
	if (password_verify($password1, $hashed_password)) {
		// Generar cod_puesto y comprobar si ya existe una igual en la BD 
		$cod_puesto = strval(rand(1000,9999)); // cast de int a string
		$buscar_puesto = mysqli_query($conexion, "SELECT * FROM puestos WHERE cod_puesto = '$cod_puesto'");
		if (mysqli_num_rows($buscar_puesto) > 0) {
			echo '<script>
					alert("El código de puesto ya existe. Vuelva a intentarlo");
					window.history.back();
				</script>';
			exit;
		} else {
			// Consulta de insercion de oferta de trabajo
			$publicar_oferta = "INSERT INTO puestos (cod_puesto, cif_empresa, ambito_profesional, descripcion) VALUES ('$cod_puesto', '$varempresa', '$ambito_profesional', '$descripcion')";
		}
	} else {
		echo '<script>
			alert("La contraseña introducida es incorrecta");
			window.history.back();
			</script>';
		exit;
	}
	// Ejecutar consulta
	$resultado = mysqli_query($conexion, $publicar_oferta);
	if (!$resultado) {
		echo 'Error al publicar la oferta de trabajo';
	} else {
		echo '<script>
				alert("Se ha publicado la oferta de trabajo");
				window.history.go(-2);
			  </script>';
	}
	// Cerrar conexion
	mysqli_close($conexion);
?>
	
	



	
	



	
	


