<?php include_once("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../_header.php"); ?>
<body>
    <?php
        
        if (isset($_POST["enviar"])) 
        {
            $idclase = $_POST["idclase"];
            $idcliente = $_POST["idcliente"];

            $sqlInscripcion ="INSERT INTO inscripciones (idclase,idcliente) VALUES ('$idclase','$idcliente')";
            $consultaInscripcion=mysqli_query($link,$sqlInscripcion);
            if($consultaInscripcion) {
			    if(isset($_POST["pagocuota"])){
                    $idinscripcion = mysqli_insert_id($link);
                    $fecha = date("Y-m-d");
                    $sqlPago ="INSERT INTO pagos (idinscripcion,fecha,pagocuota) VALUES ('$idinscripcion','$fecha','1')";
                    $consultaPago=mysqli_query($link,$sqlPago);
                    echo "<script> alert('Inscripción Cargada'); </script>";
                } else echo "<script> alert('Inscripción Cargada'); </script>";
			} else echo "<script> alert('Error en Carga de Inscricpción'); </script>";
        }

        $listaClases = mysqli_query($link, "SELECT * FROM clases");
        $listaClientes = mysqli_query($link, "SELECT * FROM clientes");

        
    ?>
<?php require_once("../_navbar.php"); ?>
<main class="CONTENEDOR">    
    <form method="POST">     
        <legend >Cargar Inscripción</legend>
        <fieldset >
            <section>
                <label class='FORMULARIO__label' for="idclase">Seleccione una Clase:</label>
                <select name="idclase" id="idclase">
                    <?php while($clase = mysqli_fetch_assoc($listaClases)): ?>
                    <option value="<?= $clase["idclase"] ?>"><?= $clase["descripcion"] ?> - <?= $clase["dia"]?> <?= $clase["hora"]?></option>	
                    <?php endwhile; ?>
                </select>
            </section>
            
            <section>
            <label class='FORMULARIO__label' for="clientes">Cliente:</label>
            <select name="idcliente" id="idcliente">
                <?php while($cliente = mysqli_fetch_assoc($listaClientes)){?>
                <option value="<?=$cliente["idcliente"]?>">Socio Nº: <?=$cliente["idcliente"]?> - Nombre: <?=$cliente["nomape"]?></option>
                <?php } ?>
            </select>
            </section>
            <section>
            <label class='FORMULARIO__label' for="pagocuota">pagó:</label>
            <input type="checkbox" name="pagocuota" id="pagocuota" value="<?=$cliente["idcliente"]?>">
            </section>
            <input class='FORMULARIO__submit' type="submit" value="Enviar" name="enviar">
            
        </fieldset>
        
    </form>
    <a class="BOTON" href='../index.php'>Volver</a>
</main>

</body>
</html>