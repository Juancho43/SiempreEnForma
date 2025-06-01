<?php
require_once("../conexion.php");

if(!isset($_GET["id"])) header('Location: ../index.php');

if(isset($_POST["eliminar"])) {
    $idsala = $_POST["idsala"];
    $eliminarSQL = "UPDATE salas SET eliminado = '1' WHERE idsala = $idsala";
    $eliminarConsulta = mysqli_query($link, $eliminarSQL);

    header('Location: ../index.php');
}

$idSala = $_GET["id"];
$salaSQL = "SELECT idsala, num, tipo FROM salas WHERE idsala = $idSala";
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
                <legend>Eliminar</legend>
                <section>
                <p>¿Estas seguro de eliminar la sala: <b><?= $salaFila["tipo"] ?> #<?= $salaFila["num"] ?></b>?</p>
                <input type="hidden" name="idsala" value="<?= $salaFila["idsala"] ?>">
                </section>
                <input class="FORMULARIO__submit" type="submit" value="Eliminar recurso" name="eliminar">
                
            </fieldset>
        </form>
        <a class="BOTON" href="../index.php">Volver</a>
    </main>
</body>
</html>