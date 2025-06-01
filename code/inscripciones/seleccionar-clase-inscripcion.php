<?php require_once("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../_header.php"); ?>
<body>
<?php
    
    $sql = "SELECT * FROM clases";
    $listaClases = mysqli_query($link,$sql);      
?>
<?php require_once("../_navbar.php"); ?>
<main class="CONTENEDOR">
    <form action="listar-inscripciones.php" method="GET">
        <section>
        <label class='FORMULARIO_label' for="idclases">Seleccione una Clase:</label>
            <select name="idclase" id="idclase">
                <?php while($clase = mysqli_fetch_assoc($listaClases)){?>
                <option value="<?=$clase["idclase"]?>">Clase: <?=$clase["descripcion"]?> - Día: <?=$clase["dia"]?> - Hora: <?=$clase["hora"]?></option>
                <?php } ?>
            </select>
        </section>
    
    <input class="FORMULARIO__submit" type="submit" value="Enviar">
    </form>
    <a class="BOTON" href='../index.php'>Volver</a>
</main>

</body>