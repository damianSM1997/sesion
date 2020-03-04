<?php
	include("funciones.php");
	Comprobar_sesion();
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sesion</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<header>
		
	</header>

	<section id="inicio">
		<section class="sesion">
			<form>
				<h1>Estas en tu sesion o la de alguien mas xd</h1>

				<?php
			 		include ("conexion.php");
					$correo = $_SESSION['correo'];
					$sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
					$res = $conexion->query($sql);
					$usuario = $res->fetch_assoc();
				?>

			<h3>Nombre: <?php echo $usuario['nombre']; ?></h3>
			<h3>Apellido: <?php echo $usuario['apellido']; ?></h3>
			<h3>Correo: <?php echo $usuario['correo']; ?></h3>
			<a href="funciones.php?num=3">Cerrar sesion</a>

			</form>
		</section>
	</section>
</body>
</html>