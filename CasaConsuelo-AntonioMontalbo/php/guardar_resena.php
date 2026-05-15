<?php

    include("conexion.php");

    $nombre = $_POST["nombre"];
    $comentario = $_POST["comentario"];
    $valoracion = $_POST["valoracion"];

    $fecha = date("Y-m-d");

    $sql = "INSERT INTO resena (nombre, comentario, valoracion, fecha) VALUES ('$nombre','$comentario','$valoracion','$fecha')";

    mysqli_query($conexion, $sql);

    header("Location: ../contacto.php");

?>