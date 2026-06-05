<?php


include("../php/conexion.php");
include("../model/contacto_model.php");

$contacto = new Contacto($conexion);
$mensajes = $contacto->obtenerMensajes();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensajes</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css"  media="screen and (max-width: 768px)">
</head>

<body>
    <div class="contenedor-admin">
        <h1>Mensajes</h1>
        <table class="tabla-admin">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Respuesta</th>
                <th>Acciones</th>
            </tr>

            <?php foreach($mensajes as $fila) { ?>

            <tr>
                <td><?php echo $fila["nombre"]; ?></td>
                <td><?php echo $fila["email"]; ?></td>
                <td><?php echo $fila["mensaje"]; ?></td>
                <td><?php echo $fila["fecha"]; ?></td>
                <td><?php echo $fila["estado"]; ?></td>
                <td><?php echo $fila["respuesta"]; ?></td>
                <td>
                    <form action="../controller/admin_controller.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $fila["id"]; ?>">
                        <input type="text" name="respuesta">
                        <button type="submit" name="responder_mensaje" class="boton-panel">Responder</button>
                    </form>

                    <br>

                    <a href="../controller/admin_controller.php?eliminar_mensaje=<?php echo $fila["id"]; ?>" class="boton-eliminar">Eliminar</a>

                </td>
            </tr>

            <?php } ?>
        </table>

        <a href="panel_view.php" class="volver-panel">Volver al panel</a>

    </div>

</body>

</html>