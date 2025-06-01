<?php
require_once("conexion.php");

if(isset($_SESSION["correo"])) header('Location: index.php');

if(isset($_POST["login"])) {
	$correo = mysqli_real_escape_string($link, $_POST["correo"]);
	$clave = $_POST["clave"];

	$adminSQL = "SELECT idadmin, password, correo, COUNT(idadmin) as cant FROM administradores WHERE correo = '$correo';";
	$adminConsulta = mysqli_query($link, $adminSQL);
	$adminFila = mysqli_fetch_assoc($adminConsulta);
	
	if($adminFila["cant"] == 1) {
		if(password_verify($clave, $adminFila["password"])) {
			$_SESSION["idadmin"] = $adminFila["idadmin"];
			$_SESSION["correo"] = $adminFila["correo"];
			header('Location: index.php');
		} else echo "<script> alert('Clave incorrecta'); </script>";
	}
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/form.css">
	
	<link rel="shortcut icon" href="icon.png" type="image/x-icon">
	<title>Gimnasio</title>
</head>
<body>
	<main class="CONTENEDOR" >
		<form class="FORMULARIO" method="POST">
			<legend class="FORMULARIO__legend">Iniciar sesión</legend>
			<fieldset class="FORMULARIO__parte">	
				<label class="FORMULARIO__label" for="correo">Correo</label>
				<input class="FORMULARIO__input" type="email" name="correo" id="correo" >
				<label class="FORMULARIO__label" for="clave">Contraseña</label>
				<input class="FORMULARIO__input" type="password" name="clave" id="clave">
			</fieldset>	
			<input class="FORMULARIO__submit" type="submit" name="login" value="Iniciar sesión">
		</form>
	</main>
</body>
</html>
