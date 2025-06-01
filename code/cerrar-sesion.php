<?php
require_once("conexion.php");

if(!isset($_SESSION["correo"])) header("Location: iniciar-sesion.php");

if(isset($_POST["logout"])) {
	session_destroy();
	header("Location: iniciar-sesion.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/sesion.css">
	<link rel="shortcut icon" href="icon.png" type="image/x-icon">
	<title>Gimnasio</title>
</head>
<body>
	<main class="CONTENEDOR" >
		<form class="FORMULARIO" method="POST">
			<legend class="FORMULARIO__legend">Cerrar sesión</legend>
			<label class="FORMULARIO__label" >¿Está seguro de cerrar sesión <?php echo $_SESSION["correo"] ?> ?</label >			
			<a class="BOTON" href='index.php'>Volver</a>
			<input class="FORMULARIO__submit" type="submit" name="logout" value="Cerrar sesión">
		</form>
	</main>
</body>
</html>
