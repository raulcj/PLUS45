<?php 
	include 'conexion.php';
	session_start();
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
		<title>PLUS45: Modificar datos</title>
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
			<form class="formulario_registro" action="modificar_militar.php" method="post">
				<h4>UCO de destino</h4>
				<select class="campo" name="unidad">
	    			<!-- Opciones de la lista -->
	    			<option class="campo" value="Default" selected>Seleccionar UCO de destino</option>
				    <option class="campo" value="UCO-001">ACLOG</option>
				    <option class="campo" value="UCO-002">AGRUSAN 3</option>
				    <option class="campo" value="UCO-003">ARAGON 1</option>
				    <option class="campo" value="UCO-004">BHELMA III</option>
				    <option class="campo" value="UCO-005">BHELMA IV</option>
				    <option class="campo" value="UCO-006">CENAD San Gregorio</option>
				    <option class="campo" value="UCO-007">CGMAAA</option>
				    <option class="campo" value="UCO-008">RACTA 4</option>
				    <option class="campo" value="UCO-009">RC ESPAÑA 11</option>
				    <option class="campo" value="UCO-010">REW 31</option>
				    <option class="campo" value="UCO-011">REW 32</option>
				    <option class="campo" value="UCO-012">RICZM AMÉRICA 66</option>
				    <option class="campo" value="UCO-013">RING 1</option>
				    <option class="campo" value="UCO-014">RPEI 12</option>
				    <option class="campo" value="UCO-015">RT 21</option>
			  	</select>
		    	<h4>Datos personales</h4>
		    	<?php
		    		$buscar_militar = mysqli_query($conexion, "SELECT * FROM militares WHERE dicodef = '$vardicodef'");
		    		$fila = $buscar_militar->fetch_array(MYSQLI_ASSOC);
		    	?>
		    	<input class="campo" name="dni" type="text" placeholder="<?php echo $fila['dni']; ?>"minlength="9" maxlength="9" pattern="[0-9]{8}[A-Z]{1}">
		    	<input class="campo" name="tim" type="text" placeholder="<?php echo $fila['tim']; ?>" minlength="12" maxlength="12" pattern="[0-9]{11}[A-Z]{1}">
			    <input class="campo" name="nombre" type="text" placeholder="<?php echo $fila['nombre']; ?>" pattern="[A-Za-zÀ-ž\s]+">
			    <input class="campo" name="apellido1" type="text" placeholder="<?php echo $fila['apellido1']; ?>" pattern="[A-Za-zÀ-ž\s]+">
			    <input class="campo" name="apellido2" type="text" placeholder="<?php echo $fila['apellido2']; ?>" pattern="[A-Za-zÀ-ž\s]+">
			    <input class="campo" name="edad" type="text" placeholder="<?php echo $fila['edad']; ?>" minlength="2" maxlength="2" required pattern="[0-9]{2}">
			    <input class="campo" name="telefono" type="text" placeholder="<?php echo $fila['telefono']; ?>" pattern="[0-9]+">
			    <input class="campo" name="direccion" type="text" placeholder="<?php echo $fila['direccion']; ?>">
			    <input class="campo" name="codigopostal" type="text" placeholder="<?php echo $fila['codigopostal']; ?>" minlength="5" maxlength="5" pattern="[0-9]+">
			    <input class="campo" name="email" type="email" placeholder="<?php echo $fila['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
			    <h4>Currículum Vitae</h4>
			    <input class="campo" name="nivel_estudios" type="text" placeholder="<?php echo $fila['nivel_estudios']; ?>">
			    <input class="campo" name="idiomas" type="text" placeholder="<?php echo $fila['idiomas']; ?>">
			    <input class="campo" name="experiencia" type="text" placeholder="<?php echo $fila['experiencia']; ?>">
			    <h4>Datos de usuario PLUS45</h4>
			    <input class="campo" name="password1" type="password" placeholder="Contraseña PLUS45" minlength="6" maxlength="20" required>
			    <input class="campo" name="password2" type="password" placeholder="Repetir contraseña PLUS45" minlength="6" maxlength="20" required>
			    <input class="boton" type="submit" value="ENVIAR Y MODIFICAR"/>
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