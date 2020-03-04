<?php
function Insertar($nombre,$apellido,$correo,$contrasena){
	
	if($nombre==""||$correo==""||$contrasena==""){

		header("Location: index.php?var=error1");
	}else{

	include("conexion.php");
	$filtro = "SELECT * FROM usuarios WHERE correo = '$correo'";
	/*parte para que analiza si el usuario ya existe a partir de la variable filtro
	de la parte de arriba, la cual a partir de una consulta sql checa si el correo 
	ya esta establesida en la DB */
	$res = $conexion->query($filtro);
	$comparador = $res->fetch_assoc();
	/*y aparter de la variable res hace un query que la enlasa a la variable $filtro
	logre hacer la consulta y con el fetch_assoc se hace la magia de guardar y dar los 
	datos que se realizan a partir de l consulta*/

	if ($comparador > 0) {
		header("Location: index.php?var=error2correo");
	}else{
		$sql = "INSERT INTO usuarios(nombre,apellido,correo,contrasena) VALUES('$nombre','$apellido','$correo','$contrasena')";

		$res = $conexion->query($sql);
		if ($res) {
		header("Location: index.php?var=sesion");
		}else{
		echo "pues valio pistola";
		}
	}


	
	/**/
	}

}


function Sesion($correo, $contrasena){
	include("conexion.php");

	$sql = "SELECT * FROM usuarios WHERE correo='".addslashes($correo)."' AND contrasena= '".addslashes($contrasena)."'";
	$res = $conexion->query($sql);
	session_start();
	# parte que comprueva que exista el contacto
	if ($comprobar = mysqli_fetch_array($res)) {
		$_SESSION['correo'] = $correo;
		$_SESSION['contrasena'] = $contrasena;

		header("Location: sesion.php");
	}else{
		header("Location: index.php?var=error");
	}


}

function Cerrar_sesion(){
	session_start();
	session_destroy();
	header("Location: index.php");

}

function Comprobar_sesion(){
	session_start();
	if (isset($_SESSION['correo']) and isset($_SESSION['contrasena'])) {
	}else{
		session_destroy();
		header("Location: index.php");
	}
}
	

@$num = $_REQUEST['num'];

switch ($num) {
	case 1:
	Insertar($_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['contrasena']);
	break;

	case 2:
		Sesion($_POST['correo'],$_POST['contrasena']);
	break;

	default: #echo "Ese caso no existe"; 
	break;
	
	case '3':
		Cerrar_sesion();
		break;


}

?>