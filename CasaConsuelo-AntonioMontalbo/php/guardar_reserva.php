<?php

    include("conexion.php");

    $nombre = $_POST["nombre"];
    $dni = $_POST["dni"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $f_entrada = $_POST["f_entrada"];
    $f_salida = $_POST["f_salida"];
    $personas = $_POST["personas"];
    $precio = $_POST["precio"];

    /* GUARDAR CLIENTE */

    $sqlCliente = "INSERT INTO cliente(nombre, dni, email, telefono) VALUES('$nombre', '$dni', '$email', '$telefono')";

    mysqli_query($conexion, $sqlCliente);

    $id_cliente = mysqli_insert_id($conexion);

    /* GUARDAR RESERVA */

    $sqlReserva = "INSERT INTO reserva (f_entrada, f_salida, personas, precio, id_cliente)
                    VALUES ('$f_entrada', '$f_salida', '$personas', '$precio', '$id_cliente')";

    mysqli_query($conexion, $sqlReserva);

    echo "<h1>Reserva realizada correctamente</h1><a href='../reservas.php'>Volver</a>";

?>