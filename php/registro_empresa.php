<!-- Tipo de documento -->
<!DOCTYPE html>
<html>
	<!-- Metadatos -->
	<head>
		<!-- Tipo de codificación de caracteres -->
		<meta charset="utf-8"/>
		<!-- Titulo de página -->
		<title>PLUS45: Registro empresarial</title>
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
				<a href="../index.php"><h1>PLUS45</h1></a>
			</div>	
		</header>
		<!-- Contenedor principal del cuerpo -->
		<section>
			<form class="formulario_registro" action="registrar_empresa.php" method="post">
		    	<h4>Datos fiscales</h4>
		    	<input class="campo" name="cif1" type="text" placeholder="CIF" minlength="9" maxlength="9" required pattern="[A-Z]{1}[0-9]{8}">
		    	<input class="campo" name="nombre" type="text" placeholder="Nombre" pattern="[A-Za-zÀ-ž\s]+">
			    <input class="campo" name="tipo_sociedad" type="text" placeholder="Tipo de sociedad">
			    <h4>Datos de usuario PLUS45</h4>
			    <input class="campo" name="cif2" type="text" placeholder="Repetir CIF" minlength="9" maxlength="9" required pattern="[A-Z]{1}[0-9]{8}">
			    <input class="campo" name="password1" type="password" placeholder="Nueva contraseña PLUS45" minlength="6" maxlength="20" required>
			    <input class="campo" name="password2" type="password" placeholder="Repetir contraseña PLUS45" minlength="6" maxlength="20" required>
			    <p>Al registrarme acepto los <a href="">términos y condiciones</a></p>
			    <input class="boton" type="submit" value="REGISTRAR"/>
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