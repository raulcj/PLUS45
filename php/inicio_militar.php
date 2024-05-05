<?php
	include 'conexion.php';
	session_start();
	error_reporting(0); // quitar error de PHP
	// Comprobacion de inicio de sesion
	$vardicodef = $_SESSION['usuario'];
	if ($vardicodef == null || $vardicodef == '') {
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
		<title>PLUS45: Bienvenid@</title>
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
		    	<h4>Bienvenid@, 
		    		<?php 					
						// Consultas de nombre y apellidos
		    			$buscar_nombre = mysqli_query($conexion, "SELECT nombre FROM militares WHERE dicodef = '$vardicodef'");
		    			$buscar_apellido1 = mysqli_query($conexion, "SELECT apellido1 FROM militares WHERE dicodef = '$vardicodef'");
		    			$buscar_apellido2 = mysqli_query($conexion, "SELECT apellido2 FROM militares WHERE dicodef = '$vardicodef'");
		    			// Verificar nombre y apellidos
		    			if(mysqli_num_rows($buscar_nombre) > 0) {
		    				$fila = $buscar_nombre->fetch_array(MYSQLI_ASSOC);
		    				$_SESSION['nombre'] = $fila['nombre'];
		    			} else {
		    				echo 'No se ha encontrado Nombre de usuario';
		    			}
		    			if(mysqli_num_rows($buscar_apellido1) > 0) {
		    				$fila = $buscar_apellido1->fetch_array(MYSQLI_ASSOC);
		    				$_SESSION['apellido1'] = $fila['apellido1'];
		    			} else {
		    				echo 'No se ha encontrado Apellido1 de usuario';
		    			}
		    			if(mysqli_num_rows($buscar_apellido2) > 0) {
		    				$fila = $buscar_apellido2->fetch_array(MYSQLI_ASSOC);
		    				$_SESSION['apellido2'] = $fila['apellido2'];
		    			} else {
		    				echo 'No se ha encontrado Apellido2 de usuario';
		    			}
		    			// Mostrar nombre y apellidos
		    			echo $_SESSION['nombre'];
		    			echo ' ';
		    			echo $_SESSION['apellido1'];
		    			echo ' ';
		    			echo $_SESSION['apellido2'];			
		    		?>	
		    	</h4>
		    	<?php 
		    		$buscar_dni = mysqli_query($conexion, "SELECT dni FROM militares WHERE dicodef = '$vardicodef'");
		    		$fila = $buscar_dni->fetch_array(MYSQLI_ASSOC);
		    		$dni_militar = $fila['dni'];
		    		$consultar_dni = mysqli_query($conexion, "SELECT * FROM puestos WHERE dni_militar = '$dni_militar'");
		    		if (mysqli_num_rows($consultar_dni) > 0) {
		    			$fila2 = $consultar_dni->fetch_array(MYSQLI_ASSOC);
		    			$cod_puesto = $fila2['cod_puesto'];
		    			$ambito_profesional = $fila2['ambito_profesional'];
		    			$consultar_empresa = mysqli_query($conexion, "SELECT nombre FROM empresas WHERE cif = (SELECT cif_empresa FROM puestos WHERE cod_puesto = '$cod_puesto')");
		    			$fila3 = $consultar_empresa->fetch_array(MYSQLI_ASSOC);
		    			$nombre_empresa = $fila3['nombre'];
		    			$descripcion_puesto = $fila2['descripcion'];
		    			echo '<h3>';
		    			echo '¡Enhorabuena!, se le ha adjudicado la oferta con código ';
		    			echo $cod_puesto;
		    			echo ', ámbito ';
		    			echo $ambito_profesional;
		    			echo ', en la empresa ';
		    			echo $nombre_empresa;
		    			echo '.</h3>';
		    		}
		    	?>
		    	<a href="listado_ofertas.php" class="opcion">Ver ofertas de trabajo</a>
		    	<a href="modificacion_militar.php" class="opcion">Modificar datos</a>
		    	<a href="dar_de_baja_militar.php" class="opcion" id="eliminar_usuario">Dar de baja</a>
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