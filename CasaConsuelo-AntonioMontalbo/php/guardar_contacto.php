<?php

    include("conexion.php");

    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    $fecha = date("Y-m-d");

    $sql = "INSERT INTO contacto (nombre,email,mensaje,fecha) VALUES ('$nombre','$email','$mensaje','$fecha')";

    mysqli_query($conexion, $sql);

    header("Location: ../contacto.php");

?>