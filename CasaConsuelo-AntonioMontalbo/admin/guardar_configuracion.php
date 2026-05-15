<?php

    include("comprobar_admin.php");
    include("../php/conexion.php");

    $direccion = $_POST["direccion"];
    $localidad = $_POST["localidad"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];


    $sql = "UPDATE configuracion 
    SET direccion='$direccion', localidad='$localidad', telefono='$telefono', email='$email'
    WHERE id_configuracion = 0";

    mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Configuración guardada</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css"  media="screen and (max-width: 768px)">
</head>

<body>
    <div class="mensaje-correcto">
        <h1>Configuración modificada correctamente</h1>
        <br><br>

        <a href="configuracion.php" class="volver-panel">Volver</a>
    </div>
</body>
</html>