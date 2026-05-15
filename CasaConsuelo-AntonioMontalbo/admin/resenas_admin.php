<?php
    include("comprobar_admin.php");
    include("../php/conexion.php");

    $sql = "SELECT * FROM resena ORDER BY id DESC";

    $resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reseñas</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css"  media="screen and (max-width: 768px)">
</head>

<body>

    <div class="contenedor-admin">
        <h1>Reseñas</h1>

        <table class="tabla-admin">
            <tr>
                <th>Nombre</th>
                <th>Comentario</th>
                <th>Valoración</th>
                <th>Fecha</th>
                <th>Eliminar</th>
            </tr>

            <?php while($fila = mysqli_fetch_assoc($resultado)) { ?>

            <tr>
                <td><?php echo $fila["nombre"]; ?></td>
                <td><?php echo $fila["comentario"]; ?></td>
                <td><?php echo $fila["valoracion"]; ?>/10</td>
                <td><?php echo $fila["fecha"]; ?></td>
                <td>
                    <a class="boton-eliminar" href="eliminar_resena.php?id=<?php echo $fila["id"]; ?>">Eliminar</a>
                </td>
            </tr>

            <?php } ?>
        </table>

        <a href="panel.php" class="volver-panel">Volver al panel</a>
    </div>

</body>

</html>