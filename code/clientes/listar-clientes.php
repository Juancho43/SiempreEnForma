<?php 
include_once("../conexion.php"); 

if(isset($_GET["filtrar"])) {
    if(($_GET["clase"] !== "NULL") || $_GET["idprofesor"] !== "NULL") {
        $consultaFiltrada = "SELECT 
        cl.* 
        FROM clientes cl 
        LEFT JOIN inscripciones i ON (cl.idcliente = i.idcliente) 
        LEFT JOIN clases c ON (c.idclase = i.idclase) 
        LEFT JOIN profesores p on (c.idprofesor = p.idprofesor) 
        WHERE cl.eliminado = '0' 
        AND c.eliminado = '0'";
    }

    if($_GET["clase"] !== "NULL") {
        $clase = $_GET["clase"];
        $consultaFiltrada .= " AND c.descripcion LIKE '%$clase%'";
    }

    if($_GET["idprofesor"] !== "NULL") {
        $idprofesor = $_GET["idprofesor"];
        $consultaFiltrada .= " AND p.idprofesor = $idprofesor";
    }

    // echo $consultaFiltrada;
}

$profesoresSQL = "SELECT idprofesor, nomape FROM profesores WHERE eliminado = '0'"; 
$profesoresConsulta = mysqli_query($link, $profesoresSQL);

$listaClasesSQL = "SELECT descripcion FROM clases WHERE eliminado = '0' GROUP BY descripcion;";
$listaClasesConsulta = mysqli_query($link, $listaClasesSQL);
?>
<!DOCTYPE html>
<html lang="es">
<?php include_once("../_header.php"); ?>
<body>
    <?php include_once("../_navbar.php"); ?>
    <main class="CONTENEDOR">
        <form>
        <table class="TABLA" style="width: 100%;">
            <tr>
                <th colspan="2">Filtrar por</th>
            </tr>
            <tr>
                <th>Clase</th>
                <th>Profesor</th>
                <th>Pago</th>
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
                    <select name="idprofesor">
                        <option value="NULL">Ninguno</option>
                        <?php while($profesor = mysqli_fetch_assoc($profesoresConsulta)): ?>
                        <option value="<?= $profesor["idprofesor"] ?>"><?= $profesor["nomape"] ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
                <td>
                    <select name="pago">
                        <option value="NULL">Ninguno</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Filtrar" name="filtrar"></td>
            </tr>
        </table>
        </form>

        <table class="TABLA">
            <thead>    
                <tr class="TABLA__fila">
                    <th>Número de Socio</th>
                    <th>Nombre Y Apellido</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Profesión</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>        
                <?php
                    include_once("../conexion.php");
                    $clientes = "SELECT * FROM clientes WHERE eliminado = '0'"; 
                    if(isset($consultaFiltrada)) $consulta = mysqli_query($link, $consultaFiltrada);
                    else $consulta = mysqli_query($link,$clientes); 
                    
                    while($row = mysqli_fetch_assoc($consulta)){
                        echo "<tr class='TABLA__fila'>";
                        echo "<td>",$row["idcliente"],"</td>";
                        echo "<td>",$row["nomape"],"</td>";
                        echo "<td>",$row["telefono"],"</td>";
                        echo "<td>",$row["correo"],"</td>";
                        echo "<td>",$row["profesion"],"</td>";
                        echo "<td><a href='editar-cliente.php?id=",$row["idcliente"],"'>Editar</a></td>";
                        echo "<td><a href='eliminar-cliente.php?id=",$row["idcliente"],"'>Eliminar</a></td>";
                        echo "</tr>";
                    }
                ?>      
            </tbody>
        </table>
    <a class="BOTON" href='../index.php'>Volver</a>
    </main>
</body>
