<?php

    include("../php/conexion.php");

    $id = $_GET["id"];

    $sql = "DELETE FROM contacto WHERE id='$id'";

    mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Eliminar mensaje</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css"  media="screen and (max-width: 768px)">
    <meta http-equiv="refresh" content="2;url=mensajes.php">
</head>

<body>
    <div class="mensaje-correcto">
        Mensaje eliminado correctamente
    </div>
</body>

</html>