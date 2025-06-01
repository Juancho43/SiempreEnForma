<!DOCTYPE html>
<html lang="en">
<?php require_once("header.php"); ?>
<body>
    <?php
        include_once("conexion.php");
        if (isset($_POST["enviar"])) 
        {
            $nomape = $_POST["nomape"];
            $telefono = $_POST["telefono"];
            $correo = $_POST["correo"];
            $profesion = $_POST["profesion"];
            
            $clientes ="INSERT INTO clientes (nomape,telefono,correo,profesion) VALUES ('$nomape','$telefono','$correo','$profesion')";
            $consulta=mysqli_query($link,$clientes);
            if($consulta)
			    echo "<script> alert('Cliente Cargado'); </script>";
			else
				echo "<script> alert('Error en Carga de Cliente'); </script>";
        }
    
    ?>

<main class="CONTENEDOR">    
    <form method="POST">     
        <legend class='FORMULARIO_legend'>Buscar sus Datos con su Número de Cliente</legend>
        <fieldset class='FORMULARIO_parte'>
            <label class='FORMULARIO_label' for="idcliente">Número de Cliente:</label>
            <input class='FORMULARIO_input' type="text" name="idcliente" id="idcliente" required autofocus placeholder="Nº Cliente"><br><br>
            <input class='FORMULARIO_submit' type="submit" value="Enviar" name="enviar">
            <button class="FORMULARIO_submit"><a href='index.php'>Volver</a></button>
        </fieldset>
    </form>
</main>
</select>
</body>
</html>