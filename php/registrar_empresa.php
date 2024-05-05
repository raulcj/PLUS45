<?php
	include 'conexion.php';
	// Guardar los datos de registro y almacenarlos en variables
	$cif1 = $_POST["cif1"];
	$cif2 = $_POST["cif2"];
	$password1 = $_POST["password1"];
	$password2 = $_POST["password2"];
	$nombre = $_POST["nombre"];
	$tipo_sociedad = $_POST["tipo_sociedad"];
	// Comprobar campos obligatorios
	if ($nombre == null || $nombre == '') {
		echo '<script>
				alert("Introduzca un nombre de empresa");
				window.history.back();
			  </script>';
		exit;
	}
	if ($cif1 == null || $cif1 == '') {
		echo '<script>
				alert("Introduzca un número de CIF");
				window.history.back();
			  </script>';
		exit;
	}
	if ($cif2 == null || $cif2 == '') {
		echo '<script>
				alert("Vuelva a introducir el número de CIF");
				window.history.back();
			  </script>';
		exit;
	}
	if ($cif1 != $cif2) {
		echo '<script>
				alert("Los números de CIF introducidos no coinciden");
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
	// Verificar si el usuario empresa existe ya o no
	$verificar_empresa = mysqli_query($conexion, "SELECT * FROM empresas WHERE cif = '$cif1'");
	if (mysqli_num_rows($verificar_empresa) > 0) {
		echo '<script>
				alert("La empresa ya existe");
				window.history.back();
			  </script>';
		exit;
	}
	// Encriptar la contraseña
	$hashed_password = password_hash($password1, PASSWORD_DEFAULT);
	// Consulta de insercion de datos de registro empresarial
	$insertar = "INSERT INTO empresas (cif, password, nombre, tipo_sociedad) VALUES ('$cif1', '$hashed_password', '$nombre', '$tipo_sociedad')";
	// Ejecutar consulta
	$resultado = mysqli_query($conexion, $insertar);
	if (!$resultado) {
		echo 'Error en el registro';
	} else {
		echo '<script>
				alert("Empresa registrada con éxito");
				window.location = "../index.php";
			  </script>';
	}
	// Cerrar conexion
	mysqli_close($conexion);
?>

	
	


