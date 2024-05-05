<?php
	include 'conexion.php';
	session_start();
	// error_reporting(0); // quitar error de PHP
	// Comprobacion de inicio de sesion
	$varcif = $_SESSION['usuario'];
	if ($varcif == null || $varcif == '') {
		echo 'No tiene autorización para iniciar sesión';
		die();
	}
	// Obtener CODIGO del puesto de trabajo y DNI del solicitante
	$cod_puesto_solicitud = $_GET["cod_puesto_solicitud"];
	$dni_solicitud = $_GET["dni_solicitud"];
	// Comprobar si la oferta ya esta adjudicada
	$buscar_oferta = mysqli_query($conexion, "SELECT * FROM puestos WHERE cod_puesto = '$cod_puesto_solicitud'");
	$fila = $buscar_oferta->fetch_array(MYSQLI_ASSOC);
	if ($fila['dni_militar'] != null) {
		echo '<script>
				alert("La oferta ya está adjudicada");
				window.history.back();
			  </script>';  
		exit;
	} 
	// Comprobar si el solicitante ya tiene una oferta adjudicada
	$buscar_dni = mysqli_query($conexion, "SELECT * FROM puestos WHERE dni_militar = '$dni_solicitud'");
	if (mysqli_num_rows($buscar_dni) > 0) {
		echo '<script>
				alert("El solicitante ya tiene otra oferta adjudicada");
				window.history.back();
			  </script>';  
		exit;
	} 
	// Consulta asignar DNI a la oferta en la tabla Puestos
	$adjudicar_oferta = "UPDATE puestos SET dni_militar = '$dni_solicitud' WHERE cod_puesto = '$cod_puesto_solicitud'";
	// Consulta borrar solicitudes de esta oferta
	$borrar_solicitudes = "DELETE FROM solicitudes WHERE cod_puesto = '$cod_puesto_solicitud' OR dni_militar = '$dni_solicitud'"; 
	// Comprobar consulta
	$resultado1 = mysqli_query($conexion, $adjudicar_oferta);
	$resultado2 = mysqli_query($conexion, $borrar_solicitudes);
	if (!$resultado1 || !$resultado2) {
		echo 'Error al adjudicar la oferta';
	} else {
		echo '<script>
				window.history.back();
			  </script>';
	}
	// Cerrar conexion
	mysqli_close($conexion);
?>