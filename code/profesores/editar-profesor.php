<?php include_once("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<?php require_once("../_header.php"); ?>
<body onload="checkbox()">
    <?php require_once("../_navbar.php"); ?>
    <main class="CONTENEDOR">
        <form class='FORMULARIO' method="post">
            <legend class="FORMULARIO__label">Actualizar Profesor</legend>
            <fieldset class='FORMULARIO__parte'>
            <?php
                $idprofesor = $_GET["id"];
                $consulta = mysqli_query($link,"SELECT * FROM profesores where idprofesor = '$idprofesor'");
                $profesor = mysqli_fetch_assoc($consulta);
                echo"<section class='FORMULARIO__section'>";
                echo"<label class='FORMULARIO__label' for='dni'>DNI: </label>";
                echo"<input class='FORMULARIO__input' type='text' name='dni' value='$profesor[dni]'>";
                echo"</section>";
                echo"<section class='FORMULARIO__section'>";
                echo"<label class='FORMULARIO__label' for='nombre'>Nombre: </label>";
                echo"<input class='FORMULARIO__input' type='text' name='nomape' value='$profesor[nomape]'>";
                echo"</section>";
                echo"<section class='FORMULARIO__section'>";
                echo"<label class='FORMULARIO__label' for='telefono'>Telefono: </label>";
                echo"<input class='FORMULARIO__input' type='text' name='telefono' value='$profesor[telefono]'>";
                echo"</section>";
                echo"<section class='FORMULARIO__section'>";
                echo"<label class='FORMULARIO__label' for='ingreso'>Fecha de Ingreso: </label>";
                echo"<input class='FORMULARIO__input' type='date' name='ingreso' value='$profesor[ingreso]'>";
                echo"</section>";
                echo"<section class='FORMULARIO__section'>";
                echo"<label class='FORMULARIO__label' for='nacimiento'>Fecha de Nacimiento: </label>";
                echo"<input class='FORMULARIO__input' type='date' name='nacimiento' value='$profesor[nacimiento]'>";
                echo"</section>";
                
                echo"<input class='FORMULARIO__submit' type='submit' name='actualizar'>";

                if (isset($_POST["actualizar"])) {
                    $dni = $_POST["dni"];
                    $nomape = $_POST["nomape"];
                    $telefono = $_POST["telefono"];
                    $ingreso = $_POST["ingreso"];
                    $nacimiento = $_POST["nacimiento"];
            
                    $profesores ="UPDATE profesores 
                    SET dni = '$dni' , nomape = '$nomape' , telefono = '$telefono', ingreso = '$ingreso', nacimiento = '$nacimiento' 
                    WHERE idprofesor = '$idprofesor' ";
                    $consulta=mysqli_query($link,$profesores);
                    if($consulta)
                        echo "<script> alert('Profesor Actualizado'); window.location.href = '../profesores/ver-profesor.php'; </script>";
                    else
                        echo "<script> alert('Error en Actuaización de Profesor'); </script>";

                }
                    
            ?>
            </fieldset>
        </form>
        <a class="BOTON" href='../listar-profesores.php'>Volver</a>
    </main> 
</body>