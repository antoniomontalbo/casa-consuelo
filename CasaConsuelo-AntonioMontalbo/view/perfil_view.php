<?php

    session_start();

    if(!isset($_SESSION["id"])){
        header("Location: login_view.php");
        exit();
    }

    include("../php/conexion.php");

    include("../model/reserva_model.php");
    include("../model/contacto_model.php");
    include("../model/usuario_model.php");

    $reserva = new Reserva($conexion);
    $contacto = new Contacto($conexion);
    $usuario = new Usuario($conexion);

    $reservas = $reserva->obtenerReservasUsuario($_SESSION["id"]);
    $mensajes = $contacto->obtenerMensajesUsuario($_SESSION["id"]);
    $datosUsuario = $usuario->obtenerUsuario($_SESSION["id"]);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css">
</head>

<body>

<section class="contenedor-principal">
    <h1>Mi Perfil</h1>
    <h2>Datos usuario</h2>
    <table class="tabla-admin">

        <tr>
            <th>Campo</th>
            <th>Valor</th>
        </tr>

        <tr>
            <td>Nombre</td>
            <td><?php echo $datosUsuario["nombre"]; ?></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><?php echo $datosUsuario["email"]; ?></td>
        </tr>

        <tr>
            <td>Teléfono</td>
            <td><?php echo $datosUsuario["telefono"]; ?></td>
        </tr>

        <tr>
            <td>Rol</td>
            <td><?php echo $datosUsuario["rol"]; ?></td>
        </tr>

        <tr>
            <td>Fecha registro</td>
            <td><?php echo $datosUsuario["fecha_registro"]; ?></td>
        </tr>

    </table>

    <h2>Mis Reservas</h2>

    <?php

    if(count($reservas) == 0){
        echo "<p>No tienes reservas.</p>";
    }else{

    ?>

    <table class="tabla-admin">

        <tr>
            <th>Entrada</th>
            <th>Salida</th>
            <th>Personas</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>

        <?php foreach($reservas as $fila){ ?>
        <tr>
            <td><?php echo $fila["f_entrada"]; ?></td>
            <td><?php echo $fila["f_salida"]; ?></td>
            <td><?php echo $fila["personas"]; ?></td>
            <td><?php echo $fila["precio"]; ?>€</td>
            <td><?php echo $fila["estado"]; ?></td>
            <td>

            <?php if($fila["estado"] == "confirmada" || $fila["estado"] == "pendiente"){ ?>

                <a href="../controller/reservas_controller.php?cancelar=<?php echo $fila["id"]; ?>" class="boton-eliminar">Cancelar</a>

                <br><br>

                <form action="../controller/reservas_controller.php" method="POST">

                    <input type="hidden" name="modificar" value="1">

                    <input type="hidden" name="id" value="<?php echo $fila["id"]; ?>">

                    <label>Entrada</label>

                    <input type="date" name="f_entrada" value="<?php echo $fila["f_entrada"]; ?>">

                    <br><br>

                    <label>Salida</label>

                    <input type="date" name="f_salida" value="<?php echo $fila["f_salida"]; ?>">

                    <br><br>

                    <label>Personas</label>

                    <select name="personas">

                        <?php for($i=1;$i<=11;$i++){ ?>

                        <option value="<?php echo $i; ?>"
                            <?php
                            if($fila["personas"] == $i){
                                echo "selected";
                            }

                            ?>
                        >
                            <?php echo $i; ?>
                        </option>

                        <?php

                        }

                        ?>

                    </select>

                    <br><br>

                    <button type="submit" class="boton-panel">Guardar cambios</button>
                </form>

            <?php

            }else{
                echo "Reserva cancelada";
            }

            ?>
            </td>
        </tr>

        <?php } ?>

    </table>

    <?php } ?>

    <h2>Mis Mensajes</h2>

    <?php

    if(count($mensajes) == 0){
        echo "<p>No tienes mensajes.</p>";
    }else{

    ?>

    <table class="tabla-admin">
        <tr>
            <th>Mensaje</th>
            <th>Estado</th>
            <th>Respuesta</th>
            <th>Fecha</th>
        </tr>

        <?php foreach($mensajes as $fila){ ?>

        <tr>
            <td>
                <?php echo $fila["mensaje"]; ?>
            </td>

            <td>
                <?php echo $fila["estado"]; ?>
            </td>

            <td>
                <?php echo $fila["respuesta"]; ?>
            </td>

            <td>
                <?php echo $fila["fecha"]; ?>
            </td>

        </tr>

        <?php } ?>

    </table>

    <?php } ?>

    <br><br>

    <a href="../index.php?pagina=inicio" class="volver-panel">Volver a la web</a>

    <a href="../controller/usuario_controller.php?logout=1" class="volver-panel">Cerrar sesión</a>

</section>

</body>

</html>