<?php

    session_start();

    include("../php/conexion.php");

    $usuario = $_POST["usuario"];

    $contraseña = $_POST["contrasena"];


    $sql = "SELECT * FROM administrador
            WHERE usuario='$usuario'
            AND contrasena='$contraseña'";

    $resultado = mysqli_query($conexion, $sql);


    if(mysqli_num_rows($resultado) > 0) {
        $_SESSION["admin"] = $usuario;
        header("Location: panel.php");
    } else {
        echo " <h1>Datos incorrectos</h1> <a href='login.php'>Volver</a> ";
    }
?>