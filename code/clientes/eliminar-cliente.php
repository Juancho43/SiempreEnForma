<?php include_once("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<?php include_once("../_header.php"); ?>
<body onload="alerta()">

<?php include_once("../_navbar.php"); ?>
    <main class="CONTENEDOR">
        <form class="FORMULARIO" method="post" id="eliminar">        
            <?php
                $idcliente = $_GET["id"];
                $clientes = "SELECT * FROM clientes WHERE idcliente = '$idcliente'"; 
                $consulta = mysqli_query($link,$clientes); 
                $cliente = mysqli_fetch_assoc($consulta);

                echo "<label class='FORMULARIO__label'>Seguro que quiere eliminar a : $cliente[nomape]</label><br>";
                if (isset($_POST["enviar"])) {
                    $eliminar=mysqli_query($link,"UPDATE clientes SET eliminado = '1' WHERE idcliente = '$idcliente'");
                    if($consulta)
                    echo "<script>alert('Eliminado'); window.location.href = '../clientes/listar-clientes.php';</script>";
                } 
            ?>
            <input class="FORMULARIO__submit" type="submit" value="Eliminar" name="enviar">        
        </form>
        <a class="BOTON" href='../listar-cliente.php'>Cancelar</a>
    </main>
</body>