<?php
require_once("../conexion.php");

if(!isset($_GET["id"])) header('Location: ../index.php');

if(isset($_POST["eliminar"])) {
    $idclase = $_POST["idclase"];
    $eliminarSQL = "UPDATE clases SET eliminado = '1' WHERE idclase = $idclase";
    $eliminarConsulta = mysqli_query($link, $eliminarSQL);

    header('Location: ../index.php');
}

$idClase = $_GET["id"];
$claseSQL = "SELECT idclase, descripcion, codigo FROM clases WHERE idclase = $idClase";
$claseConsulta = mysqli_query($link, $claseSQL);
$claseFila = mysqli_fetch_assoc($claseConsulta);

?>
<!DOCTYPE html>
<html lang="es">
<?php include_once("../_header.php"); ?>
<body>
<?php include_once("../_navbar.php"); ?>
    <main class="CONTENEDOR">
        <form class="FORMULARIO" method="POST">
            <fieldset>
                <legend>Eliminar</legend>
                <p>¿Estas seguro de eliminar la clase: <b><?= $claseFila["descripcion"] ?> #<?= $claseFila["codigo"] ?></b>?</p>
                <input type="hidden" name="idclase" value="<?= $claseFila["idclase"] ?>">
                <input type="submit" value="Eliminar clase" name="eliminar">
                
            </fieldset>
        </form>
        <a class="BOTON" href="../index.php">Volver</a>
    </main>
</body>
</html>