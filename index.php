<!DOCTYPE html>
<html>
	<!-- Metadatos -->
	<head>
		<!-- Tipo de codificación de caracteres -->
		<meta charset="utf-8"/>
		<!-- Diseño responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- Titulo de página -->
		<title>PLUS45: Login</title>
		<!-- Incluir favicon de ventana -->
		<link type="image/x-icon" rel="shortcut icon" href="images/favicon.ico"/>
		<!-- Enlaza CSS externo -->
		<link rel="stylesheet" type="text/css" href="css/externo.css"/>
		<!-- CSS interno -->
		<style type="text/css">
			#registro_militar {
				float: left;
			}
			#registro_empresa {
				float: right;
			}	
		</style>
	</head>
	<!-- Cuerpo de página -->
	<body>
		<!-- Cabecera de página -->
		<header>
			<div id="header_plus45">
				<a href="https://ejercito.defensa.gob.es/" target="_blank"><img src="images/logoET.png"/></a>
				<a href=""><h1>PLUS45</h1></a>
			</div>	
		</header>
		<!-- Contenedor principal del cuerpo -->
		<section>
			<form class="formulario_registro" action="php/login.php" method="post">
					<h4>USUARIO</h4>
					<input class="campo" name="usuario" type="text" placeholder="Usuario DICODEF o CIF de empresa"/>
					<p></p>
					<h4>CONTRASEÑA</h4>
					<input class="campo" name="password" type="password" placeholder="Contraseña PLUS45"/>
					<div>
						<p>¿No eres usuario?</p>
						<span id="registro_militar"><a href="php/registro_militar.php">REGISTRO MILITAR</a></span>
						<span id="registro_empresa"><a href="php/registro_empresa.php">REGISTRO EMPRESARIAL</a></span>
					</div>
					<input class="boton" type="submit" value="CONECTAR"/>				
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
				<a href="https://www.defensa.gob.es/" target="_blank"><img id="logoMINISDEF" src="images/logoMINISDEF.jpg"/></a>
			</div>
		</footer>
	</body>
</html>

