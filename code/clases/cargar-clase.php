<?php
require_once("../conexion.php");

if(isset($_POST["cargar"])) {
	$idsala = $_POST["idsala"];
	$idprofesor = $_POST["idprofesor"];
	$descripcion = $_POST["descripcion"];
	$codigo = $_POST["codigo"];
	$dia = $_POST["dia"];
	$hora = $_POST["hora"];
	
	$sql = "INSERT INTO clases (idsala, idprofesor, descripcion, codigo, dia, hora) VALUES ($idsala, $idprofesor,'$descripcion', '$codigo', '$dia', '$hora');";
	$consulta = mysqli_query($link, $sql);

	if($consulta)
		echo "<script> alert('Clase Cargada'); </script>";
	else
		echo "<script> alert('Error en Carga de Clase'); </script>";
}
	
$listaSalasSQL = "SELECT idsala, num, tipo FROM salas WHERE eliminado = '0'";
$listaSalasConsulta = mysqli_query($link, $listaSalasSQL);

$listaProfesoresSQL = "SELECT idprofesor, nomape FROM profesores WHERE eliminado = '0'";
$listaProfesoresConsulta = mysqli_query($link, $listaProfesoresSQL);

?>
<!DOCTYPE html>
<html>
<?php include_once("../_header.php"); ?>
<body>
<?php include_once("../_navbar.php"); ?>
	<main class="CONTENEDOR">
		<form class="FORMULARIO" method="POST"> 
			<legend class="FORMULARIO__legend">Añadir Clase a una Sala</legend>
			<fieldset class="FORMULARIO__parte" >	
				<section class="FORMULARIO__section">
					<label class="FORMULARIO__label" for="idsala">Sala asignada</label>
					<select class="FORMULARIO__select" name="idsala" id="idsala" required autofocus>
						<?php while($sala = mysqli_fetch_assoc($listaSalasConsulta)): ?>
						<option value="<?= $sala["idsala"] ?>"><?= $sala["tipo"] ?> - <?= $sala["num"]?></option>	
						<?php endwhile; ?>
					</select>
				</section>
				<section class="FORMULARIO__section">
					<label class="FORMULARIO__label" for="idprofesor">Profesor</label>
					<select class="FORMULARIO__select" name="idprofesor" id="idprofesor" required>
						<?php while($profesor = mysqli_fetch_assoc($listaProfesoresConsulta)): ?>
						<option value="<?= $profesor["idprofesor"] ?>"><?= $profesor["nomape"] ?></option>	
						<?php endwhile; ?>
					</select>
				</section>
				<section class="FORMULARIO__section">
					<label class="FORMULARIO__label" for="descripcion">Descripción de la clase</label>
					<input class="FORMULARIO__input" type="text" name="descripcion" id="descripcion" required autofocus placeholder="Descripción">
				</section>
				<section class="FORMULARIO__section">
					<label class="FORMULARIO__label" for="codigo">Código de la clase</label>
					<input class="FORMULARIO__input" type="text" name="codigo" id="codigo" required autofocus placeholder="Código">
				</section>
				<section class="FORMULARIO__section">
					<label class="FORMULARIO__label" for="dia">Día de la clase</label>
					<select class="FORMULARIO__select" name="dia" id="dia" required>
						<option value="Lunes">Lunes</option>
						<option value="Martes">Martes</option>
						<option value="Miércoles">Miércoles</option>
						<option value="Jueves">Jueves</option>
						<option value="Viernes">Viernes</option>
						<option value="Sábado">Sábado</option>
						<option value="Domingo">Domingo</option>
					</select>
				</section>
				<section class="FORMULARIO__section">
					<label class="FORMULARIO__label" for="hora">Hora de la clase</label>
					<input class="FORMULARIO__input" type="time" name="hora" id="hora" required autofocus >
				</section>
				
				<input class="FORMULARIO__submit" type="submit" value="Cargar nueva clase" name="cargar">
			</fieldset>
		</form>
		<a class="BOTON" href="../index.php">Volver</a>
	</main>
</body>
</html>