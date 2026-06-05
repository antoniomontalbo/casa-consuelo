<?php

session_start();

if(
    !isset($_SESSION["rol"])
    ||
    $_SESSION["rol"] != "admin"
){

    header("Location: login_view.php");
    exit();

}

include("../php/conexion.php");
include("../model/reserva_model.php");

$reserva = new Reserva($conexion);

$reservas = $reserva->obtenerTodasReservas();

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
            <th>Estado</th>
            <th>Acciones</th>
        </tr>

        <?php foreach($reservas as $fila) { ?>

        <tr>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["f_entrada"]; ?></td>
            <td><?php echo $fila["f_salida"]; ?></td>
            <td><?php echo $fila["personas"]; ?></td>
            <td><?php echo $fila["precio"]; ?>€</td>
            <td><?php echo $fila["estado"]; ?></td>
            <td>

                <form action="../controller/admin_controller.php" method="POST">
                    <input type="hidden" name="modificar_reserva_admin" value="1">
                    <input type="hidden" name="id" value="<?php echo $fila["id"]; ?>">
                    <input type="date" name="f_entrada" value="<?php echo $fila["f_entrada"]; ?>">

                    <br><br>

                    <input type="date" name="f_salida" value="<?php echo $fila["f_salida"]; ?>">

                    <br><br>
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

                    <?php } ?>

                    </select>

                    <br><br>

                    <input type="number" name="precio" value="<?php echo $fila["precio"]; ?>">

                    <br><br>

                    <select name="estado">
                    <option value="pendiente"

                    <?php if($fila["estado"]=="pendiente"){
                        echo "selected";
                    }

                    ?>

                    >Pendiente</option>

                    <option value="confirmada"

                    <?php if($fila["estado"]=="confirmada"){
                        echo "selected";

                    }

                    ?>

                    >Confirmada</option>

                    <option value="cancelada"

                    <?php if($fila["estado"]=="cancelada"){
                        echo "selected";
                    }

                    ?>

                    >Cancelada</option>

                    </select>

                    <br><br>

                    <button type="submit" class="boton-panel">Guardar</button>

                </form>

            <br>

            <a href="../controller/admin_controller.php?eliminar_reserva=<?php echo $fila["id"]; ?>" class="boton-eliminar">Eliminar</a>
            </td>
        </tr>

        <?php } ?>
    </table>

    </div>
    </div>

    <div class="contenedor-volver">

        <a href="panel_view.php" class="volver-panel">Volver al panel</a>

    </div>

</body>

</html>