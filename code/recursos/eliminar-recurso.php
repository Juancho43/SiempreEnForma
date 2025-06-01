<?php
require_once("../conexion.php");

if(!isset($_GET["id"])) header('Location: ../index.php');

if(isset($_POST["eliminar"])) {
    $idrecurso = $_POST["idrecurso"];
    $eliminarSQL = "UPDATE recursos SET eliminado = '1' WHERE idrecurso = $idrecurso";
    $eliminarConsulta = mysqli_query($link, $eliminarSQL);

    header('Location: ../index.php');
}

$idRecurso = $_GET["id"];
$recursoSQL = "SELECT idrecurso, descripcion FROM recursos WHERE idrecurso = $idRecurso";
$recursoConsulta = mysqli_query($link, $recursoSQL);
$recusoFila = mysqli_fetch_assoc($recursoConsulta);

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
                <p>¿Estas seguro de eliminar el recurso: <b><?= $recusoFila["descripcion"] ?></b>?</p>
                <input type="hidden" name="idrecurso" value="<?= $recusoFila["idrecurso"] ?>">
                <input type="submit" value="Eliminar recurso" name="eliminar">
                
            </fieldset>
        </form>
        <a class="BOTON" href="../index.php">Volver</a>
    </main>
</body>
</html>