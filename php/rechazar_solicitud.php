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
	// Consulta borrar solicitud
	$borrar_solicitud = "DELETE FROM solicitudes WHERE cod_puesto = '$cod_puesto_solicitud' AND dni_militar = '$dni_solicitud'";
	// Comprobar consulta
	$resultado = mysqli_query($conexion, $borrar_solicitud);
	if (!$resultado) {
		echo 'Error al eliminar la solicitud';
	} else {
		echo '<script>
				window.history.back();
			  </script>';
	}
	// Cerrar conexion
	mysqli_close($conexion);
?>