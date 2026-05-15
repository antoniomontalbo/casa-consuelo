<?php
/*
    $conexion = mysqli_connect(

    "sql206.infinityfree.com",
    "if0_41913375",
    "casaconsuelo20",
    "if0_41913375_casaconsuelo"

    );
*/

    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";
    $bd = "casaconsuelo";

    $conexion = mysqli_connect($servidor, $usuario, $contraseña, $bd);

    if (!$conexion) {
        die("Error de conexión");
    }
?>