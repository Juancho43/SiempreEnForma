<?php
require_once("../conexion.php");

if(!isset($_GET["id"])) header('Location: ../index.php');

if(isset($_POST["eliminar"])) {
    $idadmin = $_POST["idadmin"];
    $correo = $_POST["correo"];

    $eliminarSQL = "UPDATE administradores SET eliminado = '1' WHERE idadmin = $idadmin";
    $eliminarConsulta = mysqli_query($link, $eliminarSQL);

    if($correo == $_SESSION["correo"]) {
        session_destroy();
        header('Location: ../iniciar-sesion.php');
    }

    header('Location: ../index.php');
}

$idAdmin = $_GET["id"];
$adminSQL = "SELECT idadmin, correo FROM administradores WHERE idadmin = $idAdmin";
$adminConsulta = mysqli_query($link, $adminSQL);
$adminFila = mysqli_fetch_assoc($adminConsulta);

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
                    <p>¿Estas seguro de eliminar el administrador: <b><?= $adminFila["correo"] ?></b>?</p>
                    <input type="hidden" name="idadmin" value="<?= $adminFila["idadmin"] ?>">
                    <input type="hidden" name="correo" value="<?= $adminFila["correo"] ?>">
                    <input type="submit" value="Eliminar recurso" name="eliminar">
                </section>
                
                
            </fieldset>
        </form>
        <a class="BOTON" href="../index.php">Volver</a>
    </main>
</body>
</html>