<?php
    session_start();

    include("../php/conexion.php");
    include("../model/usuario_model.php");
    include("../model/contacto_model.php");
    include("../model/resena_model.php");

    $usuario = new Usuario($conexion);
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
    /* REGISTRO */

    if(isset($_POST["registrar"])){
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $contrasena = $_POST["contrasena"];
        $telefono = $_POST["telefono"];

        if($usuario->buscarEmail($email) > 0){
            echo "El email ya existe";

        }else{
            $usuario->registrarUsuario($nombre,$email,$contrasena,$telefono);

            header("Location: ../view/login_view.php");
            exit();
        }

    }

    /* LOGIN */

    if(isset($_POST["login"])) {
        $email = $_POST["email"];
        $contrasena = $_POST["contrasena"];

        $datos = $usuario->loginUsuario($email,$contrasena);

        if($datos){
            $_SESSION["id"] = $datos["id"];
            $_SESSION["nombre"] = $datos["nombre"];
            $_SESSION["rol"] = $datos["rol"];

            header("Location: ../index.php?pagina=inicio");
            exit();

        }else{
            header("Location: ../view/login_view.php?error=1");
            exit();

        }

    }

   /* LOGOUT */

    if(isset($_GET["logout"])){
        session_destroy();
        header("Location: ../index.php?pagina=inicio");
        exit();
    }

    /* ENVIAR MENSAJE */

    if(isset($_POST["enviar_mensaje"])){

        $contacto = new Contacto($conexion);
        $id_usuario = $_SESSION["id"];
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $mensaje = $_POST["mensaje"];

        $contacto->guardarMensaje($id_usuario,$nombre,$email,$mensaje);

        mensajeCorrecto("Mensaje enviado correctamente","../index.php?pagina=contacto");

    }
    /* GUARDAR RESEÑA */

    if(isset($_POST["guardar_resena"])){
        $resena = new Resena($conexion);
        $id_usuario = $_SESSION["id"];
        $nombre = $_POST["nombre"];
        $comentario = $_POST["comentario"];
        $valoracion = $_POST["valoracion"];

        $resena->guardarResena($id_usuario,$nombre,$comentario,$valoracion);

        mensajeCorrecto("Reseña publicada correctamente","../index.php?pagina=contacto");

    }
?>