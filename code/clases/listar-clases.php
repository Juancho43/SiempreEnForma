<?php
require_once("../conexion.php");

$listaClasesSQL = "SELECT 
c.idclase,
c.descripcion, 
c.codigo, 
c.dia, 
c.hora,
p.nomape as profesor,
s.num as numSala,
s.tipo as tipoSala
FROM clases c
LEFT JOIN profesores p
ON (c.idprofesor = p.idprofesor)
LEFT JOIN salas s
ON (s.idsala = c.idsala)
WHERE c.eliminado = '0';";

$listaClasesConsulta = mysqli_query($link, $listaClasesSQL);
?>

<!DOCTYPE html>
<html lang="es">
<?php include_once("../_header.php"); ?>
<body>
<?php include_once("../_navbar.php"); ?>
    <main class="CONTENEDOR">
    <table class="TABLA">
        <thead>
            <tr>
                <th>Código</th>
                <th>Clase</th>
                <th>Horario</th>
                <th>Profesor</th>
                <th>Sala</th>
            </tr>
        </thead>
        <tbody>
            <?php while($clase = mysqli_fetch_assoc($listaClasesConsulta)): ?>
            <tr>
                <td><?= $clase["codigo"] ?></td>
                <td><?= $clase["descripcion"] ?></td>
                <td><?= $clase["dia"] ?> <?= $clase["hora"] ?></td>
                <td><?= $clase["profesor"] ?></td>
                <td><?= $clase["tipoSala"] ?> #<?= $clase["numSala"] ?></td>
                <td><a href="editar-clase.php?id=<?= $clase["idclase"] ?>">Editar</a></td>
                <td><a href="eliminar-clase.php?id=<?= $clase["idclase"] ?>">Eliminar</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a class="BOTON" href="../index.php">Volver</a>
    </main>
</body>
</html>
