<?php
	include 'conexion.php';
	session_cache_limiter('private_no_expire'); // The 'private_no_expire' mode means that the client will not receive the expired header in the first place
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
		<title>PLUS45: Ofertas publicadas</title>
		<!-- Incluir favicon de ventana -->
		<link type="image/x-icon" rel="shortcut icon" href="../images/favicon.ico"/>
		<!-- Enlaza CSS externo -->
		<link rel="stylesheet" type="text/css" href="../css/externo.css"/>
		<!-- CSS interno -->
		<style type="text/css">	
			select {
				margin-top: 5%;
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
				<caption>Ofertas publicadas</caption>
			 		<thead>
			 			<tr>
			 				<th>CÓDIGO OFERTA</th>
			 				<th>EMPRESA</th>
			 				<th>ÁMBITO</th>
			 				<th id="ampliar">DESCRIPCIÓN</th>
			 				<th>ESTADO</th>
			 			</tr>
			        </thead>
			           <tbody>
				           <?php
				           		if(!isset($_POST["ambito_profesional"])) {
				           			$ambito_profesional = "MOSTRAR TODOS";
				           		} else {
				           			$ambito_profesional = $_POST["ambito_profesional"];
				           		}
				           		
				           	   if ($ambito_profesional == "MOSTRAR TODOS") {
				           	   		$consultar_ofertas = mysqli_query($conexion, "SELECT * FROM puestos ORDER BY ambito_profesional");
				           	   } else {
				           	   		$consultar_ofertas = mysqli_query($conexion, "SELECT * FROM puestos WHERE ambito_profesional = '$ambito_profesional'");
				           	   }
				           	   if (!mysqli_num_rows($consultar_ofertas) > 0) {
				           	   		echo '<script>
											alert("No existen ofertas para este ámbito");
											window.history.back();	
											location.reload();
										  </script>';
									exit;
				           	   }              
				               while($fila = mysqli_fetch_array($consultar_ofertas)) {
				            ?>
				              <tr>
				              	<td><?php echo $fila['cod_puesto'];?></td>
				              	<td><?php 
				              		$cif_empresa = $fila['cif_empresa'];
					              	$buscar_nombre_empresa = mysqli_query($conexion, "SELECT nombre FROM empresas WHERE cif = '$cif_empresa'");
					              	$buscar_sociedad_empresa = mysqli_query($conexion, "SELECT tipo_sociedad FROM empresas WHERE cif = '$cif_empresa'");
									$fila2 = $buscar_nombre_empresa->fetch_array(MYSQLI_ASSOC);
									$fila3 = $buscar_sociedad_empresa->fetch_array(MYSQLI_ASSOC);
									echo $fila2['nombre'];
									echo ', ';
									echo $fila3['tipo_sociedad'];
				              	?>   		
				              	</td>
				              	<td><?php echo $fila['ambito_profesional'];?></td>
				              	<td><?php echo $fila['descripcion'];?></td>
				              	<td>
				              		<?php
				              			if ($fila['dni_militar'] == null) {
				              			$buscar_militar = mysqli_query($conexion, "SELECT * FROM militares WHERE dicodef ='$vardicodef'");
				              			$fila4 = $buscar_militar->fetch_array(MYSQLI_ASSOC);
				              			$dni_militar = $fila4['dni'];
				              			$cod_puesto = $fila['cod_puesto'];
				              			$buscar_solicitud = mysqli_query($conexion, "SELECT * FROM solicitudes WHERE cod_puesto = '$cod_puesto' AND dni_militar = '$dni_militar'");
										if(mysqli_num_rows($buscar_solicitud) > 0) { ?>
											<a href="enviar_solicitud.php?id_puesto=<?php echo $fila['cod_puesto'];?>" class="boton_enviar_solicitud" onclick="refrescar()"><img id="si_enviado" src="../images/solicitud_3.png" title="Oferta solicitada"/></a>
										<?php } else { ?>
											<a href="enviar_solicitud.php?id_puesto=<?php echo $fila['cod_puesto'];?>" class="boton_enviar_solicitud" onclick="refrescar()"><img id="si_disponible" src="../images/solicitud_2.png" title="Enviar solicitud"/></a>
										<?php } ?>
				              			<?php } else { 
				              			?>
				              				<img id="no_disponible" class="boton_no_disponible_solicitud" src="../images/red_x.png" title="Oferta adjudicada"/>
				              			<?php
				              			}
				              			?>            		
				              	</td>
				              </tr>
				            <?php 
				           		}
				            ?>
	           			</tbody>
	        </table>
			<form class="formulario_registro" action="listado_ofertas.php" method="post">
               	<select class="campo" name="ambito_profesional">
	    			<!-- Opciones de la lista -->
	    			<option class="campo" value="MOSTRAR TODOS" selected>MOSTRAR TODOS</option>
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
			  	<input class="boton" type="submit" value="Filtrar por ámbito"/> 
			  	<a href="inicio_militar.php" class="opcion">VOLVER AL MENÚ</a> 
			  	<a href="cerrar_sesion.php" class="opcion">CERRAR SESIÓN</a>
  			</form>
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
	<script src="../js/refrescar_pagina.js"></script>
</html>