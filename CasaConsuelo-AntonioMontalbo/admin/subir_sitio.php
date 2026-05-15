<?php

    include("../php/conexion.php");

    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $imagen = $_FILES["imagen"]["name"];


    /* SUBIR IMAGEN */

    move_uploaded_file($_FILES["imagen"]["tmp_name"], "../img/" . $imagen);


    $sql = "INSERT INTO sitios_cercanos (nombre, descripcion, imagen) VALUES ('$nombre', '$descripcion', '$imagen')";

    mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sitio añadido</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css"  media="screen and (max-width: 768px)">
    <meta http-equiv="refresh" content="2;url=sitios_admin.php">
</head>

<body>
    <div class="mensaje-correcto">
        Sitio añadido correctamente
    </div>
</body>

</html>