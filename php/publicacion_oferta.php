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
		<title>PLUS45: Publicar oferta de trabajo</title>
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
			<form class="formulario_registro" action="publicar_oferta.php" method="post">
		    	<h4>Información laboral</h4>
		    	 <select class="campo" name="ambito_profesional">
	    			<!-- Opciones de la lista -->
	    			<option class="campo" value="Default" selected>Seleccionar ámbito profesional</option>
	    			<option class="campo" value="Administración">Administración</option>
	    			<option class="campo" value="Alimentación">Alimentación</option>
	    			<option class="campo" value="Carpintería">Carpintería</option>
	    			<option class="campo" value="Comercial">Comercial</option>
				    <option class="campo" value="Construcción">Construcción</option>
				    <option class="campo" value="Enseñanza">Enseñanza</option>
				    <option class="campo" value="Entretenimiento">Entretenimiento</option>
				    <option class="campo" value="Hostelería">Hostelería</option>
				    <option class="campo" value="Informática">Informática</option>
				    <option class="campo" value="Jardinería">Jardinería</option>
				    <option class="campo" value="Limpieza viaria">Limpieza viaria</option>
				    <option class="campo" value="Logística">Logística</option>
				    <option class="campo" value="Mecánica">Mecánica</option>
				    <option class="campo" value="Sanidad">Sanidad</option>
				    <option class="campo" value="Transporte">Transporte</option>
			  	</select>
		    	<input class="campo" name="descripcion" type="text" placeholder="Descripción" required>
			    <h4>Datos de usuario PLUS45</h4>
			    <input class="campo" name="password1" type="password" placeholder="Contraseña PLUS45">
			    <input class="campo" name="password2" type="password" placeholder="Repetir contraseña PLUS45">
			    <input class="boton" type="submit" value="PUBLICAR OFERTA"/>
  			</form>
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
	</body>
</html>