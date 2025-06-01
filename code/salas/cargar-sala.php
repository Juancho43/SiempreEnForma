<?php
require_once("../conexion.php");

if(isset($_POST["cargar"])) {
	$num = $_POST["num"];
	$tipo = $_POST["tipo"];
	$m2 = $_POST["m2"];
	$ubicacion = $_POST["ubicacion"];

	$sql = "INSERT INTO salas (m2, num, tipo, ubicacion) VALUES ($m2, '$num', '$tipo', '$ubicacion')";
	$consulta = mysqli_query($link, $sql);

	if($consulta)
		echo "<script> alert('Sala Cargada'); </script>";
	else
		echo "<script> alert('Error en Carga de Sala'); </script>";
}
?>
<!DOCTYPE html>
<html>
<?php include_once("../_header.php"); ?>
<body>
<?php include_once("../_navbar.php"); ?>
	<main>
		<form method="POST"> 
			<fieldset>
				<legend>Cargar nueva sala</legend>
				<section>
				<label for="num">Número de sala</label>
				<input type="text" name="num" id="num" required autofocus>	
				</section>
				<section>
				
				<label for="tipo">Tipo de sala</label>
				<input type="text" name="tipo" id="tipo" required>
				</section>
				<section>
				<label for="ubicacion">Ubicación</label>
				<input type="text" name="ubicacion" id="ubicacion" required>
				</section>
				<section>
				<label for="m2">Metros cuadrados (M<sup>2</sup>)</label>
				<input type="number" name="m2" id="m2" step="0.01" min="0" required>
				</section>
				<section>
				<input class="FORMULARIO__submit" type="submit" value="Cargar nueva sala" name="cargar">
				
			</fieldset>
		</form>
		<a class="BOTON" href="../index.php">Volver</a>
	</main>
</body>
</html>