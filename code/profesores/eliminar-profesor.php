<?php include_once("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<?php require_once("../_header.php"); ?>
<body onload="alerta()">
    <?php require_once("../_navbar.php"); ?>
    <main class="CONTENEDOR">
    <form method="post" id="eliminar">
    <?php
        include_once("../conexion.php");
        $idprofesor = $_GET["id"];
        $profesores = "SELECT * FROM profesores WHERE idprofesor = '$idprofesor'"; 
        $consulta = mysqli_query($link,$profesores); 
        $profesor= mysqli_fetch_assoc($consulta);

        echo "<label class='FORMULARIO__label'>Seguro que quiere eliminar a : $profesor[nomape]</label>";
        if (isset($_POST["enviar"])) {
            $eliminar=mysqli_query($link,"UPDATE profesores SET eliminado = '1' WHERE idprofesor = '$idprofesor'");
            if($consulta)
            echo "<script>alert('Eliminado'); window.location.href = '../profesores/listar-profesores.php';</script>";
        } 



    ?>

    <input class="FORMULARIO_submit" type="submit" value="Eliminar" name="enviar">
    
    </form>    
    <a class="BOTON" href='./listar-profesores.php'>Cancelar</a>
    </main>

    
</body>