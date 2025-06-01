<?php
require_once("../conexion.php");

if(isset($_POST["cargar"])) {
	$descripcion = $_POST["descripcion"];
	$idsala = $_POST["idsala"];
	
	$sql = "INSERT INTO recursos (idsala, descripcion) VALUES ($idsala, '$descripcion');";
	$consulta = mysqli_query($link, $sql);
	if($consulta)
		echo "<script> alert('Recurso Cargado'); </script>";
	else
		echo "<script> alert('Error en Carga de Recurso'); </script>";
}
	
$listaSalasSQL = "SELECT idsala, num, tipo FROM salas";
$listaSalasConsulta = mysqli_query($link, $listaSalasSQL);

?>
<!DOCTYPE html>
<html>
<?php include_once("../_header.php"); ?>
<body>
<?php include_once("../_navbar.php"); ?>
	<main class="CONTENEDOR">
		<form method="POST"> 
			<fieldset>
				<legend>Añadir recurso a una sala</legend>
				<section>
					<label for="descripcion">Descripción del recurso</label>				
					<input type="text" name="descripcion" id="descripcion" required autofocus>
				</section>
				<section>
					<label for="idsala">Sala asignada</label>
					<select name="idsala" id="idsala">
						<?php while($sala = mysqli_fetch_assoc($listaSalasConsulta)): ?>
						<option value="<?= $sala["idsala"] ?>"><?= $sala["tipo"] ?> - <?= $sala["num"]?></option>	
						<?php endwhile; ?>
					</select>
				</section>
				<input class="FORMULARIO__submit" type="submit" value="Cargar nuevo recurso" name="cargar">
			</fieldset>
		</form>
		<a class="BOTON" href="../index.php">Volver</a>
	</main>
</body>
</html>