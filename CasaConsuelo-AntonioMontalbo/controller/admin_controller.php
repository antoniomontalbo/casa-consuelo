<?php

session_start();

/*CONFIGURACION*/
include("../model/configuracion_model.php");
include("../php/conexion.php");
/*GALERIA*/
include("../model/galeria_model.php");
/*SITIOS*/
include("../model/sitio_model.php");
/* MENSAJES */
include("../model/resena_model.php");
include("../model/contacto_model.php");

$contacto = new Contacto($conexion);

/*RESERVAS*/
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
/* CONFIGURACION WEB */

if(isset($_POST["guardar_configuracion"])){
    $configuracion = new Configuracion($conexion);
    $direccion = $_POST["direccion"];
    $localidad = $_POST["localidad"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $precio_base = $_POST["precio_base"];
    $color_web = $_POST["color_web"];
    $fuente_web = $_POST["fuente_web"];
    $tamano_fuente = $_POST["tamano_fuente"];

    $configuracion->actualizarConfiguracion(
        $direccion,
        $localidad,
        $telefono,
        $email,
        $precio_base,
        $color_web,
        $fuente_web,
        $tamano_fuente
    );

    mensajeCorrecto("Configuración guardada correctamente","../view/configuracion_view.php");

}

/* SUBIR IMAGEN */

if(isset($_POST["subir_imagen"])){
    $galeria = new Galeria($conexion);
    $nombreImagen = $_FILES["imagen"]["name"];
    $temporal = $_FILES["imagen"]["tmp_name"];

    move_uploaded_file($temporal,"../img/".$nombreImagen);

    $galeria->guardarImagen($nombreImagen);

    mensajeCorrecto("Imagen subida correctamente","../view/galeria_admin_view.php");

}
/* ELIMINAR IMAGEN */

if(isset($_GET["eliminar_imagen"])){
    $galeria = new Galeria($conexion);

    $galeria->eliminarImagen($_GET["eliminar_imagen"]);

    mensajeCorrecto("Imagen eliminada correctamente","../view/galeria_admin_view.php");

}

/* AÑADIR SITIO */

if(isset($_POST["guardar_sitio"])){
    $sitio = new Sitio($conexion);
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $imagen = $_FILES["imagen"]["name"];

    move_uploaded_file($_FILES["imagen"]["tmp_name"],"../img/".$imagen);

    $sitio->insertarSitio($nombre,$descripcion,$imagen);

    mensajeCorrecto("Sitio añadido correctamente","../view/sitios_admin_view.php");

}
/* MODIFICAR SITIO */

if(isset($_POST["modificar_sitio"])){
    $sitio = new Sitio($conexion);
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    $sitio->modificarSitio($id,$nombre,$descripcion);

    mensajeCorrecto("Sitio modificado correctamente","../view/sitios_admin_view.php");

}
/* ELIMINAR SITIO */

if(isset($_GET["eliminar_sitio"])){
    $sitio = new Sitio($conexion);
    $sitio->eliminarSitio($_GET["eliminar_sitio"]);

    mensajeCorrecto("Sitio eliminado correctamente","../view/sitios_admin_view.php");

}
/* RESPONDER MENSAJE */

if(isset($_POST["responder_mensaje"])){
    $id = $_POST["id"];
    $respuesta = $_POST["respuesta"];

    $contacto->responderMensaje($id,$respuesta);

    mensajeCorrecto("Mensaje respondido correctamente","../view/mensajes_view.php");

}

/* ELIMINAR MENSAJE */

if(isset($_GET["eliminar_mensaje"])){
    $id = $_GET["eliminar_mensaje"];

    $contacto->eliminarMensaje($id);

    mensajeCorrecto("Mensaje eliminado correctamente","../view/mensajes_view.php");

}
/* ELIMINAR RESEÑA */

if(isset($_GET["eliminar_resena"])){
    $resena = new Resena($conexion);
    $id = $_GET["eliminar_resena"];

    $resena->eliminarResena($id);

    mensajeCorrecto(
    "Reseña eliminada correctamente","../view/resenas_admin_view.php");

}
/* CONFIRMAR RESERVA */

if(isset($_GET["confirmar_reserva"])){
    $reserva->confirmarReserva($_GET["confirmar_reserva"]);

    mensajeCorrecto("Reserva confirmada correctamente","../view/reservas_admin_view.php");

}
/*MODIFICAR RESERVA ADMIN*/
if(isset($_POST["modificar_reserva_admin"])){
    $reserva->modificarReservaAdmin(
        $_POST["id"],
        $_POST["f_entrada"],
        $_POST["f_salida"],
        $_POST["personas"],
        $_POST["precio"],
        $_POST["estado"]
    );

   mensajeCorrecto("Reserva modificada correctamente","../view/reservas_admin_view.php");

}
/* ELIMINAR RESERVA ADMIN */

if(isset($_GET["eliminar_reserva"])){
    $reserva = new Reserva($conexion);

    $reserva->eliminarReservaAdmin($_GET["eliminar_reserva"]);

    mensajeCorrecto("Reserva eliminada correctamente","../view/reservas_admin_view.php");

}
?>