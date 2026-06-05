<?php

session_start();

if(!isset($_SESSION["rol"]) || $_SESSION["rol"] != "admin"){
    header("Location: login_view.php");
    exit();
}

include("../php/conexion.php");
include("../model/galeria_model.php");

$galeria = new Galeria($conexion);

$imagenes = $galeria->obtenerImagenes();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar galería</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css"  media="screen and (max-width: 768px)">
</head>

<body>

    <div class="contenedor-admin">
        <h1>Gestionar galería</h1>
        
        <br><br>
        <form action="../controller/admin_controller.php" method="POST" enctype="multipart/form-data" class="form-galeria">
            <input type="hidden" name="subir_imagen" value="1">
            <input type="file" name="imagen" required>
            <button type="submit" class="boton-reserva">Subir imagen</button>
        </form>

        <br><br>

        <div class="galeria-admin">
            <?php foreach($imagenes as $fila) { ?>
                <div class="imagen-admin">
                    <img src="../img/<?php echo $fila["imagen"]; ?>">

                    <br><br>

                    <a href="../controller/admin_controller.php?eliminar_imagen=<?php echo $fila["id"]; ?>" class="boton-eliminar">Eliminar</a>
                </div>
            <?php } ?>
        </div>

        <br><br>

        <a href="panel_view.php" class="volver-panel">Volver al panel</a>
    </div>

</body>

</html>