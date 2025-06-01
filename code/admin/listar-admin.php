<?php
require_once("../conexion.php");

$listaAdminsSQL = "SELECT idadmin, correo, password, count(idadmin) as cantidad FROM administradores WHERE eliminado = '0';";
$listaAdminsConsultas = mysqli_query($link, $listaAdminsSQL);

?>

<!DOCTYPE html>
<html lang="es">
<?php require_once("../_header.php"); ?>
<body>
    <?php require_once("../_navbar.php"); ?>
    <main class="CONTENEDOR">
    <table border="1" class="TABLA">
        <thead>
            <tr>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <?php while($admin = mysqli_fetch_assoc($listaAdminsConsultas)): ?>
            <tr>
                <td><?= $admin["correo"] ?></td>
                <td><a href="clave-admin.php?id=<?= $admin["idadmin"] ?>">Editar</a></td>
                <?php if($admin["cantidad"] > 1):?>
                <td><a href="eliminar-admin.php?id=<?= $admin["idadmin"] ?>">Eliminar</a></td>
                <?php endif; ?>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="../index.php" class="BOTON">Volver</a>
    </main>
</body>
</html>
