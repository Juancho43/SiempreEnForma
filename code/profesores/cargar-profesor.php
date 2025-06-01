<?php include_once("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<?php require_once("../_header.php"); ?>
<body>
    <?php
        if (isset($_POST["enviar"])) 
        {
            $dni = $_POST["dni"];
            $nomape = $_POST["nomape"];
            $telefono = $_POST["telefono"];
            $ingreso = $_POST["ingreso"];
            $nacimiento = $_POST["nacimiento"];

            $profesores ="INSERT INTO profesores (dni,nomape,telefono,ingreso,nacimiento) VALUES ('$dni','$nomape','$telefono','$ingreso','$nacimiento')";
            $consulta=mysqli_query($link,$profesores);
            if($consulta)
			    echo "<script> alert('Profesor Cargado'); </script>";
			else
				echo "<script> alert('Error en Carga de Profesor'); </script>";
        }
    
    ?>



<?php require_once("../_navbar.php"); ?>
<main class="CONTENEDOR">    
    <form class="FORMULARIO" method="POST">     
        <legend class='FORMULARIO__legend'>Nuevo Profesor</legend>
        <fieldset class='FORMULARIO__parte'>
            <section class="FORMULARIO__section">
                <label class='FORMULARIO__label' for="dni">DNI:</label>
                <input class='FORMULARIO__input' type="number" name="dni" id="dni" required autofocus placeholder="Numero de DNI">
            </section>
            <section class="FORMULARIO__section">
                <label class='FORMULARIO__label' for="nomape">Nombre Completo:</label>
                <input class='FORMULARIO__input' type="text" name="nomape" id="nomape" required placeholder="Nombre y Apellido">
            </section>    
            <section class="FORMULARIO__section">
                <label class='FORMULARIO__label' for="telefono">Telefono:</label>
                <input class='FORMULARIO__input' type="number" name="telefono" id="telefono" required placeholder="Telefono">
            </section>
            <section class="FORMULARIO__section">
                <label class='FORMULARIO__label' for="ingreso">Fecha de Ingreso:</label>
                <input class='FORMULARIO__input' type="date" name="ingreso" id="ingreso" value="<?php echo date("Y-m-d");?>" required placeholder="Ingreso">
            </section>
            <section class="FORMULARIO__section">
                <label class='FORMULARIO__label' for="nacimiento">Fecha de Nacimiento:</label>
                <input class='FORMULARIO__input' type="date" name="nacimiento" id="nacimiento" required placeholder="Nacimiento">
            </section>
            <input class='FORMULARIO__submit' type="submit" value="Enviar" name="enviar">
            
        </fieldset>
    </form>
    <a class="BOTON" href='../index.php'>Volver</a>
</main>

</body>
</html>