<?php
    include("conexion.php");

    $sql = "SELECT f_entrada, f_salida FROM reserva";
    $resultado = mysqli_query($conexion, $sql);
    $reservas = array();

    while($fila = mysqli_fetch_assoc($resultado)) {
        $reservas[] = $fila;
    }
    header("Content-Type: application/json");
    echo json_encode($reservas);
?>