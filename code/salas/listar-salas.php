<?php
require_once("../conexion.php");

$listaSalasSQL = "SELECT idsala, num, tipo, ubicacion, m2 FROM salas WHERE eliminado = '0';";
$listaSalasConsulta = mysqli_query($link, $listaSalasSQL);
?>

<!DOCTYPE html>
<html lang="es">
<?php include_once("../_header.php"); ?>
<body>
<?php include_once("../_navbar.php"); ?>
    <main>

    <table >
        <thead>
            <tr>
                <th>N° de sala</th>
                <th>Tipo</th>
                <th>Ubicación</th>
                <th>M<sup>2</sup></th>
            </tr>
        </thead>
        <tbody>
            <?php while($sala = mysqli_fetch_assoc($listaSalasConsulta)): ?>
            <tr>
                <td><?= $sala["num"] ?></td>
                <td><?= $sala["tipo"] ?></td>
                <td><?= $sala["ubicacion"] ?></td>
                <td><?= $sala["m2"] ?></td>
                <td><a href="editar-sala.php?id=<?= $sala["idsala"] ?>">Editar</a></td>
                <td><a href="eliminar-sala.php?id=<?= $sala["idsala"] ?>">Eliminar</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <a class="BOTON" href="../index.php">Volver</a>
    </main>
</body>
</html>
