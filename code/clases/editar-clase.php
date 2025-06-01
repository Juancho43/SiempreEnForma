<?php
require_once("../conexion.php");

if(!isset($_GET["id"])) header('Location: ../index.php');

if(isset($_POST["cargar"])) {
	$idclase = $_POST["idclase"];
	$idsala = $_POST["idsala"];
	$idprofesor = $_POST["idprofesor"];
	$descripcion = $_POST["descripcion"];
	$codigo = $_POST["codigo"];
	$dia = $_POST["dia"];
	$hora = $_POST["hora"];

	$sql = "UPDATE clases SET 
	idsala = $idsala,
	idprofesor = $idprofesor,
	descripcion = '$descripcion',
	codigo = '$codigo',
	dia = '$dia',
	hora = '$hora'
	WHERE idclase = $idclase;";
	
	$consulta = mysqli_query($link, $sql);
	if($consulta) echo "carga exitosa";
	else echo mysqli_error($consulta);
}

$idClase = mysqli_real_escape_string($link, $_GET["id"]);
$claseActualSQL = "SELECT idclase, idsala, idprofesor, descripcion, codigo, hora, dia FROM clases WHERE idclase = $idClase;";
$claseActualConsulta = mysqli_query($link, $claseActualSQL);
$claseActualFila = mysqli_fetch_assoc($claseActualConsulta);

$listaSalasSQL = "SELECT idsala, num, tipo FROM salas";
$listaSalasConsulta = mysqli_query($link, $listaSalasSQL);

$listaProfesoresSQL = "SELECT idprofesor, nomape FROM profesores";
$listaProfesoresConsulta = mysqli_query($link, $listaProfesoresSQL);

?>
<!DOCTYPE html>
<html>
<?php include_once("../_header.php"); ?>
<body>
<?php include_once("../_navbar.php"); ?>
	<main class="CONTENEDOR">
		<form class="FORMULARIO" method="POST"> 
			<legend>Editar Clase</legend>
			<fieldset class="FORMULARIO__parte">
				<section>
				<label class="FORMULARIO__label" for="idsala">Sala asignada</label>
				<select class="FORMULARIO__select" name="idsala" id="idsala" required autofocus>
					<?php while($sala = mysqli_fetch_assoc($listaSalasConsulta)): 
						if($sala["idsala"] === $claseActualFila["idsala"]) $selected = "selected=\"selected\"";
						else $selected = "";	
					?>
						<option value="<?= $sala["idsala"] ?>" <?= $selected ?>><?= $sala["tipo"] ?> - <?= $sala["num"]?></option>	
					<?php endwhile; ?>
				</select>
				</section>	
				<input type="hidden" name="idclase" value="<?= $claseActualFila["idclase"] ?>">
				<section>
					<label class="FORMULARIO__label" for="idprofesor">Profesor</label>
					<select class="FORMULARIO__select" name="idprofesor" id="idprofesor" required>
						<?php while($profesor = mysqli_fetch_assoc($listaProfesoresConsulta)): 
							if($profesor["idprofesor"] === $claseActualFila["idprofesor"]) $selected = "selected=\"selected\"";
							else $selected = "";
						?>
							<option value="<?= $profesor["idprofesor"] ?>" <?= $selected ?>><?= $profesor["nomape"] ?></option>	
						<?php endwhile; ?>
					</select>
				</section>
				<section>
					<label class="FORMULARIO__label" for="descripcion">Descripción de la clase</label>
					<input class="FORMULARIO__input" type="text" name="descripcion" id="descripcion" value="<?= $claseActualFila["descripcion"] ?>" required autofocus>
				</section>
				<section>
					<label class="FORMULARIO__label" for="codigo">Código de la clase</label>
					<input class="FORMULARIO__input" type="text" name="codigo" id="codigo" value="<?= $claseActualFila["codigo"] ?>" required autofocus>
				</section>
				<section>
					<label class="FORMULARIO__label" for="dia">Día de la clase</label>
					<select class="FORMULARIO__select" name="dia" id="dia" required>
						<?php
						$diasSemana = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
						for($diaIndex = 0; $diaIndex < sizeof($diasSemana); $diaIndex++):
							if($diasSemana[$diaIndex] === $claseActualFila["dia"]) $selected = "selected=\"selected\"";
							else $selected = "";
						?>

						<option value="<?= $diasSemana[$diaIndex] ?>" <?= $selected ?>><?= $diasSemana[$diaIndex] ?></option>
						<?php endfor; ?>
					</select>
				</section>
				<section>
					<label class="FORMULARIO__label" for="hora">Hora de la clase</label>
					<input class="FORMULARIO__input" type="time" name="hora" id="hora" value="<?= $claseActualFila["hora"] ?>" required autofocus>
				</section>
				<input class="FORMULARIO__submit" type="submit" value="Editar clase" name="cargar">
			</fieldset>
		</form>
		<a class="BOTON" href="../index.php">Volver</a>
	</main>
</body>
</html>