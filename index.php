<?php
	session_start();
	if (isset($_SESSION['correo']) and isset($_SESSION['contrasena'])) {
		header("Location: sesion.php");
	}else{
		session_destroy();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de registros de usuarios</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<header>
		<section>
			
			<h1>Sistema de registro</h1>
			
			<?php
				@$var = $_REQUEST['var'];
				if ($var=="error") {?>
					<span>Error al iniciar sesión, <br>vuelve a intentarlo</span>
					<form class="error" action="funciones.php?num=2" method="POST">	
			<?php }
            if ($var=="sesion") {?>
					<span style="color: blue;">sesion creada exitosamente <br> Ya puedes iniciar sesion </span>
					<form class="sesion" action="funciones.php?num=2" method="POST">	
			<?php }
			else{ ?>
				<form  action="funciones.php?num=2" method="POST">	
			<?php  } ?>
			
				
			
				<input required type="email" placeholder="Correo..." name="correo">
				<input required type="password" placeholder="Contrasena..." name="contrasena">
				<input type="submit" value="Entrar">



			</form>


		</section>

	</header>

<!-- parte de el registro de secion-->

	<section id="inicio">
		<section>

			<?php
				@$var = $_REQUEST['var'];
				if ($var=="error1") {?>
				
				<form class="requerido" action="funciones.php?num=1" method="POST">
					<span>Error al crear su cuenta, <br>Favor de llenar todos los campos <br> no sea pendejo</span>
			<?php }

				if ($var=="error2") {?>
				
				<form class="requerido" action="funciones.php?num=1" method="POST">
				<span>Error al crear su cuenta, <br>este correo ya fue registrado <br> favor de ingresar otro</span>
			<?php }

			else{?>
				<form action="funciones.php?num=1" method="POST">
			<?php }
			?>
			
				
			
				<h2>Nueva cuenta de usuario</h2>
				<input type="text" placeholder="Nombre..." name="nombre">
				<input type="text" placeholder="Apellido..." name="apellido">
				<input type="email" placeholder="Correo..." name="correo">
				<input type="password" placeholder="Contrasena" name="contrasena">
				<input type="submit" value="Registrar">
			</form>
		</section>
	</section>


</body>
</html>