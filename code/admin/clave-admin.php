<?php
require_once("../conexion.php");

if(!isset($_GET["id"])) header('Location: ../index.php');

if(isset($_POST["actualizar"])) {
    $idadmin = $_POST["idadmin"];
    $actual = $_POST["actual"];
    $nueva = $_POST["nueva"];

    $hashSQL = "SELECT password FROM administradores WHERE idadmin = $idadmin";
    $hashConsulta = mysqli_query($link, $hashSQL);
    $hashFila = mysqli_fetch_assoc($hashConsulta);

    if(password_verify($actual, $hashFila["password"])) {
        $nuevoHash = password_hash($nueva, PASSWORD_DEFAULT);
        $actualizarSQL = "UPDATE administradores SET password = '$nuevoHash' WHERE idadmin = $idadmin";
        $actualizarConsulta = mysqli_query($link, $actualizarSQL);
        header('Location: ../index.php');
    } else echo "<script> alert('Clave incorrecta'); </script>";
}

$idAdmin = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="es">
<?php include_once("../_header.php"); ?>
<body>
<?php include_once("../_navbar.php"); ?>
    <main>
        <form method="POST">
        <legend>Cambiar clave</legend>
            <fieldset>
                <section>
                <label for="actual">Clave actual</label>
				<input type="password" name="actual" id="actual" required autofocus>
                <input type="hidden" name="idadmin" value="<?= $idAdmin ?>">
                </section>
                <section>
                <label for="nueva">Nueva clave</label>
				<input type="password" name="nueva" id="nueva">
                </section>
				
				
				<input class="FORMULARIO__submit" type="submit" value="Cambiar clave" name="actualizar">
				
			</fieldset>
        </form>
        <a class="BOTON" href="../index.php">Volver</a>
    </main>
</body>
</html>
