<?php

    include("comprobar_admin.php");
    include("../php/conexion.php");

    $sql = "SELECT * FROM galeria";

    $resultado = mysqli_query($conexion, $sql);

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
        <form action="subir_imagen.php" method="POST" enctype="multipart/form-data" class="form-galeria">
            <input type="file" name="imagen" required>
            <button type="submit" class="boton-reserva">Subir imagen</button>
        </form>

        <br><br>

        <div class="galeria-admin">
            <?php while($fila = mysqli_fetch_assoc($resultado)) { ?>
                <div class="imagen-admin">
                    <img src="../img/<?php echo $fila["imagen"]; ?>">

                    <br><br>

                    <a href="eliminar_imagen.php?id=<?php echo $fila["id"]; ?>" class="boton-eliminar">Eliminar</a>
                </div>
            <?php } ?>
        </div>

        <br><br>

        <a href="panel.php" class="volver-panel">Volver al panel</a>
    </div>

</body>

</html>