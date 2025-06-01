<?php require_once("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../_header.php"); ?>
<body>
<?php require_once("../_navbar.php"); ?>
<main>
    <table>
            <thead>    
                <tr class="TABLA__fila">
                    <th>Descripción de Clase</th>
                    <th>Día</th>
                    <th>Hora</th>
                    <th>Número de Socio</th>
                    <th>Nombre Y Apellido</th>
                    <th>Pagó</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
    <?php
        
        $idclase = $_GET["idclase"];
        $sql = "SELECT i.idinscripcion, c.descripcion, c.dia, c.hora, cl.idcliente, cl.nomape, p.pagocuota, p.fecha FROM inscripciones i LEFT JOIN clases c on(c.idclase = i.idclase) LEFT JOIN clientes cl on (cl.idcliente = i.idcliente) LEFT JOIN pagos p on (i.idinscripcion = p.idinscripcion) WHERE c.idclase = $idclase AND cl.eliminado = '0'"; 
        $consulta = mysqli_query($link,$sql); 
        
        while($row = mysqli_fetch_assoc($consulta)){
            echo "<tr class='TABLA__fila'>";
            echo "<th>",$row["descripcion"],"</th>";
            echo "<th>",$row["dia"],"</th>";
            echo "<th>",$row["hora"],"</th>";
            echo "<th>",$row["idcliente"],"</th>";
            echo "<th>",$row["nomape"],"</th>";
            if($row["pagocuota"] == 1)
                $pago = "Si";
            else
                $pago = "No";
            echo "<th>",$pago,"</th>";
            echo "<th><a href='editar-inscripcion.php?id=",$row["idinscripcion"],"&idclase=", $idclase,"'>Editar</a></th>";
            echo "<th><a href='eliminar-cliente.php?id=",$row["idcliente"],"'>Eliminar</a></th>";
            echo "</tr>";
        }
    ?>
    </table>
    <a class="BOTON" href='seleccionar-clase-inscripcion.php'>Volver</a>
    </main>
</body>