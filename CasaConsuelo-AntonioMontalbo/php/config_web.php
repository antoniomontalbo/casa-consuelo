<?php

    include("conexion.php");

    $sql = "SELECT * FROM configuracion WHERE id_configuracion = 0";

    $resultado = mysqli_query($conexion, $sql);

    $config = mysqli_fetch_assoc($resultado);

?>