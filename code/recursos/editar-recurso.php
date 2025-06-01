<?php
require_once("../conexion.php");

if(!isset($_GET["id"])) header('Location: ../index.php');

if(isset($_POST["actualizar"])) {
    $idrecurso = $_POST["idrecurso"];
	$descripcion = $_POST["descripcion"];
	$idsala = $_POST["idsala"];

    $salaActualizarSQL = "UPDATE recursos
    SET idsala = $idsala,
    descripcion = '$descripcion'
    WHERE idsala = $idsala;";

    $salaActualizarConsulta = mysqli_query($link, $salaActualizarSQL);
    
    if($salaActualizarConsulta) header('Location: listar-recursos.php');
    else echo mysqli_error($link);
}

$idRecurso = $_GET["id"];
$recursoSQL = "SELECT idrecurso, idsala, descripcion FROM recursos WHERE idsala = $idRecurso";
$recursoConsulta = mysqli_query($link, $recursoSQL);
$recursoFila = mysqli_fetch_assoc($recursoConsulta);

$salasSQL = "SELECT idsala, num, tipo FROM salas";
$salasConsulta = mysqli_query($link, $salasSQL);
?>

<!DOCTYPE html>
<html lang="es">
<?php include_once("../_header.php"); ?>
<body>
<?php include_once("../_navbar.php"); ?>
    <main>
        <form method="POST">
        <legend>Editar recurso</legend>
            <fieldset>
                <section>
                <label for="descripcion">Descripción del recurso</label>
				<input type="text" name="descripcion" id="descripcion" value="<?= $recursoFila["descripcion"] ?>" required autofocus>
                </section>
                <section>
				
				<label for="idsala">Sala asignada</label>
				<select name="idsala" id="idsala">
					<?php 
                    while($sala = mysqli_fetch_assoc($salasConsulta)):
                        if($sala["idsala"] === $recursoFila["idsala"]) $selected = "selected=\"selected\"";
                        else $selected = "";
                    ?>
                        <option value="<?= $sala["idsala"] ?>" <?= @$selected ?>><?= $sala["tipo"] ?> - <?= $sala["num"]?></option>	
					<?php endwhile; ?>
				</select>
                </section>
                <section>
				<input type="submit" value="Actualizar nuevo recurso" name="actualizar">
				
			</fieldset>
        </form>
        <a class="BOTON" href="../index.php">Volver</a>
    </main>

</body>
</html>
