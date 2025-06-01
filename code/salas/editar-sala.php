<?php
require_once("../conexion.php");

if(!isset($_GET["id"])) header('Location: ../index.php');

if(isset($_POST["actualizar"])) {
    $idsala = $_POST["idsala"];
    $num = $_POST["num"];
    $tipo = $_POST["tipo"];
    $ubicacion = $_POST["ubicacion"];
    $m2 = $_POST["m2"];

    $salaActualizarSQL = "UPDATE salas 
        SET num = '$num',
        tipo = '$tipo',
        ubicacion = '$ubicacion',
        m2 = $m2 
        WHERE idsala = $idsala;";

    $salaActualizarConsulta = mysqli_query($link, $salaActualizarSQL);
    
    if($salaActualizarConsulta) header('Location: listar-salas.php');
    else echo mysqli_error($link);
}

$idSala = $_GET["id"];
$salaSQL = "SELECT * FROM salas WHERE idsala = $idSala";
$salaConsulta = mysqli_query($link, $salaSQL);
$salaFila = mysqli_fetch_assoc($salaConsulta);
?>

<!DOCTYPE html>
<html lang="es">
<?php include_once("../_header.php"); ?>
<body>
    <?php include_once("../_navbar.php"); ?>
    <main>
        <form method="POST">
            <fieldset>
                <legend>Editar sala</legend>
                
                <input type="hidden" name="idsala" value="<?= $salaFila["idsala"] ?>">
                <section>    
                    <label for="num">Número de sala</label>
                    <input type="text" name="num" id="num" value="<?= $salaFila["num"] ?>" required autofocus>
                </section>
                <section>

                
				<label for="tipo">Tipo de sala</label>
				<input type="text" name="tipo" id="tipo" value="<?= $salaFila["tipo"] ?>" required>
                </section>
                <section>
				<label for="ubicacion">Ubicación</label>
				<input type="text" name="ubicacion" id="ubicacion" value="<?= $salaFila["ubicacion"] ?>" required>
                </section>
                <section>
				<label for="m2">Metros cuadrados (M<sup>2</sup>)</label>
				<input type="number" name="m2" id="m2" step="0.01" min="0" value="<?= $salaFila["m2"] ?>" required>
                </section>
                
                <input class="FORMULARIO__submit" type="submit" value="Actualizar datos" name="actualizar">
				
            </fieldset>

        </form>
        <a class="BOTON" href="../index.php">Volver</a>
    </main>
</body>
</html>
