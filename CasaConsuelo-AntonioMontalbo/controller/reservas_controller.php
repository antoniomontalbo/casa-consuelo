<?php

session_start();

include("../php/conexion.php");
include("../model/reserva_model.php");

$reserva = new Reserva($conexion);

function mensajeCorrecto($texto, $destino){

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../estilos.css">

    <meta http-equiv="refresh" content="2;url=<?php echo $destino; ?>">
</head>

<body>
    <div class="mensaje-correcto">
        <?php echo $texto; ?>
    </div>
</body>

</html>

<?php

exit();

}
/* OBTENER RESERVAS PARA CALENDARIO */

if(isset($_GET["obtener"])){
    $reservas = $reserva->obtenerFechasReservadas();
    header("Content-Type: application/json");
    echo json_encode($reservas);

    exit();

}

/* GUARDAR */

if(isset($_POST["reservar"])){
    if(!isset($_SESSION["id"])){
        header("Location: ../view/login_view.php");
        exit();
    }

    $f_entrada = $_POST["f_entrada"];
    $f_salida = $_POST["f_salida"];
    $personas = $_POST["personas"];
    $precio = $_POST["precio"];
    $id_usuario = $_SESSION["id"];

    $reserva->guardarReserva($f_entrada,$f_salida,$personas,$precio,$id_usuario);

    mensajeCorrecto("Reserva realizada correctamente","../view/perfil_view.php");

}

/* CANCELAR */

if(isset($_GET["cancelar"])){
    $id = $_GET["cancelar"];
    $reserva->cancelarReserva($id);

    header("Location: ../view/perfil_view.php");
    exit();

}

/*MODIFICAR*/
if(isset($_POST["modificar"])){
    $id = $_POST["id"];
    $f_entrada = $_POST["f_entrada"];
    $f_salida = $_POST["f_salida"];
    $personas = $_POST["personas"];
    $precio = $_POST["precio"];

    $reserva->modificarReserva($id,$f_entrada,$f_salida,$personas,$precio);

    header("Location: ../view/perfil_view.php");
    exit();

}

?>