<?php
	include 'conexion.php';
	session_start();
	// error_reporting(0); // quitar error de PHP
	// Comprobacion de inicio de sesion
	$varcif = $_SESSION['usuario'];
	if ($varcif == null || $varcif == '') {
		echo '<script>
				alert("No tiene autorización para iniciar sesión");
			 </script>';
		header("Location:../index.php");
	}
	$consultar_solicitudes = mysqli_query($conexion, "SELECT * FROM solicitudes WHERE cod_puesto IN (SELECT cod_puesto FROM puestos WHERE cif_empresa = '$varcif')");
	if (!mysqli_num_rows($consultar_solicitudes) > 0) {
		echo '<script>
				alert("No hay solicitudes recibidas");
				window.history.back();
			  </script>';
		exit;
	} 
?>
<!-- Tipo de documento -->
<!DOCTYPE html>
<html>
	<!-- Metadatos -->
	<head>
		<!-- Tipo de codificación de caracteres -->
		<meta charset="utf-8"/>
		<!-- Titulo de página -->
		<title>PLUS45: Solicitudes recibidas</title>
		<!-- Incluir favicon de ventana -->
		<link type="image/x-icon" rel="shortcut icon" href="../images/favicon.ico"/>
		<!-- Enlaza CSS externo -->
		<link rel="stylesheet" type="text/css" href="../css/externo.css"/>
		<!-- CSS interno -->
		<style type="text/css">	
			td a img {
				display: inline-block;
			}
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
		<article>
			<table id="tabla_ofertas">
				<caption>Solicitudes recibidas</caption>
			 		<thead>
			 			<tr>
			 				<th>CÓDIGO OFERTA</th>
			 				<th>Nombre y apellidos</th>	
			 				<th>Edad</th>
			 				<th>Correo electrónico</th>
			 				<th>Teléfono</th>
			 				<th>Experiencia</th>
			 				<th>Nivel de estudios</th>
			 				<th>Idiomas</th>
			 				<th>ACCIÓN</th>		
			 			</tr>
			        </thead>
			           <tbody>
				           <?php          
				               while ($fila = mysqli_fetch_array($consultar_solicitudes)) {
				               		$dni_militar = $fila['dni_militar'];
					              	$buscar_solicitante = mysqli_query($conexion, "SELECT * FROM militares WHERE dni = '$dni_militar'");    	
									$fila2 = $buscar_solicitante->fetch_array(MYSQLI_ASSOC);
				            ?>
				              <tr>
				              	<td><?php echo $fila['cod_puesto'];?></td>
				              	<td><?php 
									echo $fila2['nombre'];
									echo ' ';
									echo $fila2['apellido1'];
									echo ' ';
									echo $fila2['apellido2'];
				              	?>   		
				              	</td>
				              	<td><?php echo $fila2['edad'];?></td>
				              	<td><?php echo $fila2['email'];?></td>
				              	<td><?php echo $fila2['telefono'];?></td>
				              	<td><?php echo $fila2['experiencia'];?></td>
				              	<td><?php echo $fila2['nivel_estudios'];?></td>
				              	<td><?php echo $fila2['idiomas'];?></td>
				              	<td>
				              		<a href="aceptar_solicitud.php?cod_puesto_solicitud=<?php echo $fila['cod_puesto'];?>&amp;dni_solicitud=<?php echo $fila['dni_militar'];?>" id="aceptar_solicitud"><img id="tick_verde" src="../images/green_tick.png" title="Aceptar solicitud"/></a>
				              		<a href="rechazar_solicitud.php?cod_puesto_solicitud=<?php echo $fila['cod_puesto'];?>&amp;dni_solicitud=<?php echo $fila['dni_militar'];?>" id="rechazar_solicitud"><img id="tick_rojo" src="../images/red_tick.png" title="Rechazar solicitud"/></a>           		
				              	</td>
				              </tr>
				            <?php 
				           		}
				            ?>
	           			</tbody>
               </table>
			<section class="formulario_registro">
				<a href="inicio_empresa.php" class="opcion">VOLVER AL MENÚ</a>
			    <a href="cerrar_sesion.php" class="opcion">CERRAR SESIÓN</a>
  			</section>
		</article>
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