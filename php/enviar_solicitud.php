<?php
	include 'conexion.php';
	session_start();
	error_reporting(0); // quitar error de PHP
	// Comprobacion de inicio de sesion
	$vardicodef = $_SESSION['usuario'];
	if ($vardicodef == null || $vardicodef == '') {
		echo 'No tiene autorización para iniciar sesión';
		die();
	}
	// Obtener ID o CODIGO del puesto de trabajo
	$id_puesto = $_GET["id_puesto"];
	// Obtener DNI del usuario
	$buscar_dni_militar = mysqli_query($conexion, "SELECT dni FROM militares WHERE dicodef = '$vardicodef'");
	$fila = $buscar_dni_militar->fetch_array(MYSQLI_ASSOC);
	$dni_militar = $fila['dni'];
	// Verificar si el usuario ya tiene una oferta adjudicada
	$consultar_dni = mysqli_query($conexion, "SELECT * FROM puestos WHERE dni_militar = '$dni_militar'");
	if (mysqli_num_rows($consultar_dni) > 0) {
		echo '<script>
				alert("Usted ya tiene una oferta adjudicada");
				window.location.replace("listado_ofertas.php");			
			  </script>';  
		exit;
	}
	// Verificar si el usuario ya ha solicitado esta oferta
	$buscar_solicitud = mysqli_query($conexion, "SELECT * FROM solicitudes WHERE cod_puesto = '$id_puesto' AND dni_militar = '$dni_militar'");
	if(mysqli_num_rows($buscar_solicitud) > 0) {
		echo '<script>
				alert("Ya ha solicitado esta oferta");
				window.location.replace("listado_ofertas.php");			
			  </script>'; 
		exit;
	}
	// Insertar solicitud
	$insertar_solicitud = "INSERT INTO solicitudes (cod_puesto, dni_militar) VALUES ('$id_puesto', '$dni_militar')";
	// Comprobar consulta
	$resultado = mysqli_query($conexion, $insertar_solicitud);
	if (!$resultado) {
		echo 'Error al solicitar la oferta';
	} 
	// Cerrar conexion
	mysqli_close($conexion);
?>