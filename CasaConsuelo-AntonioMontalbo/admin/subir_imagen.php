<?php

    include("comprobar_admin.php");
    include("../php/conexion.php");

    $imagen = $_FILES["imagen"]["name"];

    move_uploaded_file($_FILES["imagen"]["tmp_name"],"../img/" . $imagen);

    $sql = "INSERT INTO galeria(imagen) VALUES('$imagen')";

    mysqli_query($conexion, $sql);

    header("Location: galeria_admin.php");

?>