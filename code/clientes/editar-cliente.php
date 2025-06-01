<?php include_once("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<?php include_once("../_header.php"); ?>
<body onload="checkbox()">
<?php include_once("../_navbar.php"); ?>
    <main class="CONTENEDOR">
        <form class='FORMULARIO' method="post">
            <legend class="FORMULARIO__label">Actualizar Cliente</legend>
            <fieldset class='FORMULARIO__parte'>
            <?php
                $idcliente = $_GET["id"];
                $consulta = mysqli_query($link,"SELECT * FROM clientes where idcliente = '$idcliente'");
                $cliente = mysqli_fetch_assoc($consulta);
                echo"<section class='FORMULARIO__section'>";
                    echo"<label class='FORMULARIO__label' for='nombre'>Nombre: </label>";
                    echo"<input class='FORMULARIO__input' type='text' name='nomape' value='$cliente[nomape]'>";
                echo"</section>";
                echo"<section class='FORMULARIO__section'>";
                    echo"<label class='FORMULARIO__label' for='telefono'>Telefono: </label>";
                    echo"<input class='FORMULARIO__input' type='text' name='telefono' value='$cliente[telefono]'>";
                echo"</section>";
                echo"<section class='FORMULARIO__section'>";
                    echo"<label class='FORMULARIO__label' for='correo'>Correo: </label>";
                    echo"<input class='FORMULARIO__input' type='text' name='correo' value='$cliente[correo]'>";
                echo"</section>";
                echo"<section class='FORMULARIO__section'>";
                    echo"<label class='FORMULARIO__label' for='profesion'>Profesión: </label>";
                    echo"<input class='FORMULARIO__input' type='text' name='profesion' value='$cliente[profesion]'>";
                echo"</section>";
                echo"<section class='FORMULARIO__section'>";
                    echo"<label class='FORMULARIO__label' for='pagocuota'>Pagó: </label>";
                    if($cliente["pagocuota"] == 1)
                        echo"<script>
                            function checkbox(){
                                document.getElementById('pagocuota').checked = true;
                            }
                        </script>";
                   

                    echo"<input class='FORMULARIO__input' type='checkbox' name='pagocuota' id='pagocuota'><br>";
                echo"</section>";
                echo"<input class='FORMULARIO__submit' type='submit' name='actualizar' value='Editar cliente'>";

                if (isset($_POST["actualizar"])) {
                    $nomape = $_POST["nomape"];
                    $telefono = $_POST["telefono"];
                    $correo = $_POST["correo"];
                    $profesion = $_POST["profesion"];
                    @$pagocuota = $_POST["pagocuota"];
                    
                    if (isset($pagocuota))
                        $boolpago = 1;
                    else
                        $boolpago = 0;

                    $clientes ="UPDATE clientes 
                    SET nomape = '$nomape' , telefono = '$telefono', correo = '$correo', profesion = '$profesion', pagocuota = '$boolpago' 
                    WHERE idcliente = '$idcliente' ";
                    $consulta=mysqli_query($link,$clientes);
                    if($consulta)
                        echo "<script> alert('Cliente Actualizado'); window.location.href = '../clientes/listar-cliente.php'; </script>";
                    else
                        echo "<script> alert('Error en Actuaización de Cliente'); </script>";

                }
                    
            ?>
            </fieldset>
        </form>
        <a class="BOTON" href='./listar-clientes.php'>Volver</a>
    </main> 
</body>