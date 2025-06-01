<?php
        include_once("../conexion.php");
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
<!DOCTYPE html>
<html lang="es">
<?php include_once("../_header.php"); ?>
<body>
    
<?php include_once("../_navbar.php"); ?>

<main class="CONTENEDOR">    
    <form class="FORMULARIO" method="POST">     
        <legend class='FORMULARIO__legend'>Nuevo Cliente</legend>
        <fieldset class='FORMULARIO__parte'>
            <section class="FORMULARIO__section">
                <label class='FORMULARIO__label' for="nomape">Nombre Completo:</label>
                <input class='FORMULARIO__input' type="text" name="nomape" id="nomape" required autofocus placeholder="Nombre y Apellido">
            </section>
            <section class="FORMULARIO__section">
                <label class='FORMULARIO__label' for="telefono">Telefono:</label>
                <input class='FORMULARIO__input' type="number" name="telefono" id="telefono" required placeholder="Telefono">
            </section>
            <section class="FORMULARIO__section">
                <label class='FORMULARIO__label' for="correo">Correo:</label>
                <input class='FORMULARIO__input' type="email" name="correo" id="correo" required placeholder="Correo">
            </section>
            <section class="FORMULARIO__section">
                <label class='FORMULARIO__label' for="profesion">Profesión:</label>
                <input class='FORMULARIO__input' type="text" name="profesion" id="profesion" required placeholder="Profesión">
            </section> 
            <input class='FORMULARIO__submit' type="submit" value="Enviar" name="enviar">
            <a class="BOTON" href='../index.php'>Volver</a>
        </fieldset>
    </form>
</main>

</body>
</html>