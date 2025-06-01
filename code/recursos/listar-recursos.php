<?php
require_once("../conexion.php");

$listaRecursosSQL = "SELECT 
r.idrecurso,
r.descripcion,
s.num,
s.tipo
FROM recursos r 
LEFT JOIN salas s
ON (r.idsala = s.idsala)
WHERE r.eliminado = '0';";
$listaRecursosConsulta = mysqli_query($link, $listaRecursosSQL);
?>

<!DOCTYPE html>
<html lang="es">
<?php include_once("../_header.php"); ?>
<body>
<?php include_once("../_navbar.php"); ?>
    <main class="CONTENEDOR">
    <table class="TABLA">
        <thead>
            <tr class="TABLA__fila">
                <th>Recurso</th>
                <th>Sala asignada</th>
            </tr>
        </thead>
        <tbody>
            <?php while($sala = mysqli_fetch_assoc($listaRecursosConsulta)): ?>
            <tr class="TABLA__fila">
                <td><?= $sala["descripcion"] ?></td>
                <td><?= $sala["num"] ?> <?= $sala["tipo"] ?></td>
                <td><a href="editar-recurso.php?id=<?= $sala["idrecurso"] ?>">Editar</a></td>
                <td><a href="eliminar-recurso.php?id=<?= $sala["idrecurso"] ?>">Eliminar</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a class="BOTON" href="../index.php">Volver</a>
    </main>
    
    
</body>
</html>
