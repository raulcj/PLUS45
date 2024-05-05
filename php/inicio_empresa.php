<?php
	include 'conexion.php';
	session_start();
	error_reporting(0); // quitar error de PHP
	// Comprobacion de inicio de sesion
	$varcif = $_SESSION['usuario'];
	if ($varcif == null || $varcif == '') {
		echo '<script>
				alert("No tiene autorización para iniciar sesión");
			 </script>';
		header("Location:../index.php");
	}
?>

<!DOCTYPE html>
<html>
	<!-- Metadatos -->
	<head>
		<!-- Tipo de codificación de caracteres -->
		<meta charset="utf-8"/>
		<!-- Titulo de página -->
		<title>PLUS45: Bienvenido</title>
		<!-- Incluir favicon de ventana -->
		<link type="image/x-icon" rel="shortcut icon" href="../images/favicon.ico"/>
		<!-- Enlaza CSS externo -->
		<link rel="stylesheet" type="text/css" href="../css/externo.css"/>
		<!-- CSS interno -->
		<style type="text/css">	
		</style>
	</head>
	<!-- Cuerpo de página -->
	<body>
		<!-- Cabecera de página -->
		<header>
			<div id="header_plus45">
				<a href="https://ejercito.defensa.gob.es/" target="_blank"><img src="../images/logoET.png"/></a>
				<a href="cerrar_sesion.php"><h1>PLUS45</h1></a>
			</div>	
		</header>
		<!-- Contenedor principal del cuerpo -->
		<section>
			<nav class="formulario_registro">
		    	<h4>Bienvenido, 
		    		<?php 					
						// Consultas de nombre y apellidos
		    			$buscar_nombre = mysqli_query($conexion, "SELECT nombre FROM empresas WHERE cif = '$varcif'");
		    			$buscar_tipo_sociedad = mysqli_query($conexion, "SELECT tipo_sociedad FROM empresas WHERE cif = '$varcif'");
		    			// Verificar nombre y apellidos
		    			if(mysqli_num_rows($buscar_nombre) > 0) {
		    				$fila = $buscar_nombre->fetch_array(MYSQLI_ASSOC);
		    				$_SESSION['nombre'] = $fila['nombre'];
		    			} else {
		    				echo 'No se ha encontrado Nombre de usuario';
		    			}
		    			if(mysqli_num_rows($buscar_tipo_sociedad) > 0) {
		    				$fila = $buscar_tipo_sociedad->fetch_array(MYSQLI_ASSOC);
		    				$_SESSION['tipo_sociedad'] = $fila['tipo_sociedad'];
		    			} else {
		    				echo 'No se ha encontrado Tipo_Sociedad de usuario';
		    			}
		    			// Mostrar nombre y apellidos
		    			echo $_SESSION['nombre'];
		    			echo ' ';
		    			echo $_SESSION['tipo_sociedad'];		
		    		?>	
		    	</h4>
		    	<a href="listado_solicitudes.php" class="opcion">Ver solicitudes recibidas</a>
		    	<a href="publicacion_oferta.php" class="opcion">Publicar oferta de trabajo</a>
		    	<a href="dar_de_baja_empresa.php" class="opcion" id="eliminar_usuario">Dar de baja</a>
			    <a href="cerrar_sesion.php" class="opcion">CERRAR SESIÓN</a>
  			</nav>
		</section>
		<!-- Pie de página -->
		<footer>
			<!-- Contenedor de información de contacto -->
			<div id="contacto">
				<h2>Contacto Administrador</h2>
				<table>
					<tr><th>Nombre</th><td>Raul Caballero Jaime</td></tr>
					<tr><th>Email</th><td><a href="mailto:rcabjai@et.mde.es">rcabjai@et.mde.es</a></td></tr>
					<tr><th>Dirección</th><td>Av. Fuerzas Armadas, 25, 50300 Calatayud (Zaragoza)</td></tr>
				</table>
			</div>
			<!-- Contenedor de logo MINISDEF -->
			<div id="minisdef">
				<a href="https://www.defensa.gob.es/" target="_blank"><img id="logoMINISDEF" src="../images/logoMINISDEF.jpg"/></a>
			</div>
		</footer>
		<script src="../js/confirmacion_eliminar_usuario.js"></script>
	</body>
</html>