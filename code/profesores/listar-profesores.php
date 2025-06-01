<?php
include_once("../conexion.php");

if(isset($_GET["filtrar"])) {
    if(($_GET["clase"] !== "NULL") || ($_GET["antiguedad"] !== "NULL")) {
        $consultaFiltrada =  "SELECT p.*,
        c.idclase
        FROM profesores p
        LEFT JOIN clases c
        ON (c.idprofesor = p.idprofesor)
        AND p.eliminado = '0'
        AND c.eliminado = '0'";
        
    }
    
    if($_GET["clase"] !== "NULL") {
        $clase = $_GET["clase"];
        $consultaFiltrada .= " WHERE c.descripcion LIKE '%$clase%'";
    }

    if(isset($consultaFiltrada)) $consultaFiltrada .= " GROUP BY p.idprofesor";

    if($_GET["antiguedad"] !== "NULL") {
        $anti = $_GET["antiguedad"];
        $consultaFiltrada .= " ORDER BY p.ingreso $anti";
    }
}

$listaClasesSQL = "SELECT descripcion FROM clases WHERE eliminado = '0' GROUP BY descripcion;";
$listaClasesConsulta = mysqli_query($link, $listaClasesSQL);
?>
<!DOCTYPE html>
<html lang="es">
<?php require_once("../_header.php"); ?>
<body>
    <?php require_once("../_navbar.php"); ?>
    <main class="CONTENEDOR">
    
    <form>
    <table class="TABLA" style="width: 100%;">
        <tr>
            <th colspan="2">
                Filtrar por:
                <?php if(isset($clase)):?>
                <em><?= $clase ?></em>
                <?php endif;?>
            </th>
        </tr>
        <tr>
            <th>Clase</th>
            <th>Antiguedad</th>
        </tr>
        <tr>
            <td>
                <select name="clase">
                    <option value="NULL">Ninguno</option>
                    <?php while($clase = mysqli_fetch_assoc($listaClasesConsulta)): ?>
                        <option value="<?= $clase["descripcion"] ?>"><?= $clase["descripcion"] ?></option>
                    <?php endwhile; ?>
                </select>
            </td>
            <td>
                <select name="antiguedad">
                    <option value="NULL">Ninguno</option>
                    <option value="ASC">Mayor antigüedad</option>
                    <option value="DESC">Menor antigüedad</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Filtrar" name="filtrar"></td>
        </tr>
    </table>
    </form>

    <table class="TABLA">
            <thead>    
                <tr class="TABLA__fila">
                    <th>DNI</th>
                    <th>Nombre Y Apellido</th>
                    <th>Telefono</th>
                    <th>Fecha de Ingreso</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
    <?php
        include_once("../conexion.php");
        $profesores = "SELECT * FROM profesores WHERE eliminado = '0'"; 
        if(isset($consultaFiltrada)) $consulta = mysqli_query($link,$consultaFiltrada); 
        else $consulta = mysqli_query($link,$profesores); 
        
        while($row = mysqli_fetch_assoc($consulta)){
            echo "<tr class='TABLA__fila'>";
            echo "<td>",$row["dni"],"</td>";
            echo "<td>",$row["nomape"],"</td>";
            echo "<td>",$row["telefono"],"</td>";
            echo "<td>",$row["ingreso"],"</td>";
            echo "<td>",$row["nacimiento"],"</td>";
            echo "<td><a href='editar-profesor.php?id=",$row["idprofesor"],"'>Editar</a></td>";
            echo "<td><a href='eliminar-profesor.php?id=",$row["idprofesor"],"'>Eliminar</a></td>";
            echo "</tr>";
        }
    ?>
    </table>
    <a class="BOTON" href='../index.php'>Volver</a>
    </main>
</body>