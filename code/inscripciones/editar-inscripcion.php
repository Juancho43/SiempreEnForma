<?php include_once("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../_header.php"); ?>
<body onload="checkbox()">
<?php require_once("../_navbar.php"); ?>
    <main class="CONTENEDOR">
        <form class='FORMULARIO' method="post">
            <legend class="FORMULARIO__label">Actualizar Inscripción</legend>
            <fieldset class='FORMULARIO__parte'>
            <?php
                
                $idinscripcion = $_GET["id"];
                $idclase = $_GET["idclase"];

                $listaClientes = mysqli_query($link, "SELECT * FROM clientes WHERE eliminado = '0'");
                $consulta = mysqli_query($link,"SELECT i.idinscripcion, c.descripcion, c.dia, c.hora, cl.idcliente, cl.nomape, p.pagocuota, p.fecha FROM inscripciones i LEFT JOIN clases c on(c.idclase = i.idclase) LEFT JOIN clientes cl on (cl.idcliente = i.idcliente) LEFT JOIN pagos p on (i.idinscripcion = p.idinscripcion) WHERE i.idinscripcion = $idinscripcion");
                $inscripcion = mysqli_fetch_assoc($consulta);
                
                echo"<label class='FORMULARIO__label'>Inscripción a Clase: $inscripcion[descripcion] - De: $inscripcion[dia] $inscripcion[hora] </label>";
    
                echo"<label class='FORMULARIO__label' for='cliente'>Cliente: </label>";
                echo"<select name='idcliente' id='idcliente'>";
				while($clientes = mysqli_fetch_assoc($listaClientes)):
				echo"<option name='idcliente' value= '$clientes[idcliente]'>  $clientes[nomape] - $clientes[correo] </option>";	
				endwhile; 
			    echo"</select>";
                echo"<input class='FORMULARIO_submit' type='submit' name='actualizar' value='Actualizar'>";

                if (isset($_POST["actualizar"])) {
                    $idcliente = $_POST["idcliente"];
    
                    $inscripcion ="UPDATE inscripciones 
                    SET idcliente = '$idcliente' 
                    WHERE idinscripcion = '$idinscripcion' ";
                    $consulta=mysqli_query($link,$inscripcion);
                    if($consulta)
                        echo "<script> alert('Inscripción Actualizada'); window.location.href = 'listar-inscripciones.php?idclase=",$idclase,"'; </script>";
                    else
                        echo "<script> alert('Error en Actuaización de Inscripción'); </script>";
                
                }
                    
            ?>
            </fieldset>

            
            <button class="FORMULARIO_submit"><a href="../inscripciones/listar-inscripciones.php?idclase=<?php echo $idclase; ?>">Volver</a></button>
        </form>
    </main> 
</body>