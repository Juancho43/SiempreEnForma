<?php
require_once("../conexion.php");

if(isset($_POST["cargar"])) {
	$correo = mysqli_real_escape_string($link, $_POST["correo"]);
	$clave = mysqli_real_escape_string($link, $_POST["clave"]);

	$existeSQL = "SELECT COUNT(correo) as cantidad FROM administradores WHERE correo = '$correo';";
	$existeConsulta = mysqli_query($link, $existeSQL);
	$existeFila = mysqli_fetch_assoc($existeConsulta);

	if($existeFila["cantidad"] < 1) {
		$claveHash = password_hash($clave, PASSWORD_DEFAULT);
		$nuevoSQL = "INSERT INTO administradores (correo, password) VALUES ('$correo', '$claveHash');";
		$nuevoConsulta = mysqli_query($link, $nuevoSQL);

		if($nuevoConsulta) echo "<script> alert('Administrador creador'); </script>";
		else echo "<script> alert('Error en Carga de Recurso'); </script>";
	} else echo "<script> alert('Correo ya utilizado'); </script>";
}
	
$listaSalasSQL = "SELECT idsala, num, tipo FROM salas";
$listaSalasConsulta = mysqli_query($link, $listaSalasSQL);

?>
<!DOCTYPE html>
<html>
<?php include_once("../_header.php"); ?>
<body>
<?php include_once("../_navbar.php"); ?>
	<main>
		<form method="POST"> 
			<fieldset>
				<legend>Añadir nuevo administrador</legend>
				<section>
					<label for="correo">Correo electrónico</label>
					<input type="text" name="correo" id="correo" required autofocus>
				</section>
				<section>
				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave">
				</section>
				
				<input class=FORMULARIO__submit type="submit" value="Cargar administrador" name="cargar">
				
			</fieldset>
		</form>
		<a class="BOTON" href="../index.php">Volver</a>
	</main>
</body>
</html>