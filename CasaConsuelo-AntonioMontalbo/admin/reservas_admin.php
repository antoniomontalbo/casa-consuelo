<?php
    include("comprobar_admin.php");
    include("../php/conexion.php");

    $sql = "SELECT reserva.*, cliente.nombre FROM reserva INNER JOIN cliente
    ON reserva.id_cliente = cliente.id
    ORDER BY reserva.id DESC";

    $resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservas</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css"  media="screen and (max-width: 768px)">
</head>

<body>
    <div class="contenedor-admin">

    <h1>Reservas</h1>
    <table class="tabla-admin">

        <tr>
            <th>Nombre</th>
            <th>Entrada</th>
            <th>Salida</th>
            <th>Personas</th>
            <th>Precio</th>
            <th>Eliminar</th>
        </tr>

        <?php while($fila = mysqli_fetch_assoc($resultado)) { ?>

        <tr>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["f_entrada"]; ?></td>
            <td><?php echo $fila["f_salida"]; ?></td>
            <td><?php echo $fila["personas"]; ?></td>
            <td><?php echo $fila["precio"]; ?>€</td>
            <td>
                <a class="boton-eliminar" href="eliminar_reserva.php?id=<?php echo $fila["id"]; ?>">Eliminar</a>
            </td>
        </tr>

        <?php } ?>
    </table>

    </div>
    <a href="panel.php" class="volver-panel">Volver al panel</a>
</body>

</html>