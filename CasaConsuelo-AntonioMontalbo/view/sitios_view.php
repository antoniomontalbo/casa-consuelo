<?php

session_start();


include("php/conexion.php");
include("model/sitio_model.php");

$sitio = new Sitio($conexion);

$sitios = $sitio->obtenerSitios();


if(!isset($config)){

    include("php/conexion.php");
    include("model/configuracion_model.php");

    $configuracion = new Configuracion($conexion);

    $config = $configuracion->obtenerConfiguracion();

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Consuelo</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="responsive.css"  media="screen and (max-width: 768px)">
    <style>

    body{
        background-color:
        <?php echo $config["color_web"]; ?>;
    }
    main{
        font-family:
        <?php echo $config["fuente_web"]; ?>;
    }

    .principal *{
        font-size:
        <?php echo $config["tamano_fuente"]; ?>px !important;
    }

    </style>
</head>

<body>
    <header>

    <div class="cabecera-contenido">
        <img src="img/logo.png" alt="Casa Consuelo" class="logo-cabecera">
        <h1>Casa Consuelo</h1>
        <?php if(isset($_SESSION["id"])){ ?>

        <?php if($_SESSION["rol"] == "admin"){ ?>

            <a href="view/panel_view.php" class="boton-admin">Panel Admin</a>

        <?php }else{ ?>

            <a href="view/perfil_view.php"class="boton-admin">Mi Perfil</a>

        <?php } ?>

            <a href="controller/usuario_controller.php?logout=1" class="boton-admin">Cerrar sesión</a>

        <?php }else{ ?>
            <a href="login_view.php" class="boton-admin">Iniciar sesión</a>

        <?php } ?>

    </div>

    <nav>
        <ul class="menu-principal">
            <li><a href="index.php?pagina=inicio">Inicio</a></li>
            <li><a href="index.php?pagina=galeria">Galería</a></li>
            <li><a href="index.php?pagina=sitios" style="background-color:#976c4e; box-shadow:3px 3px 8px black;">Sitios cercanos</a></li>
            <li><a href="index.php?pagina=contacto">Contacto</a></li>
            <li><a href="index.php?pagina=reservas">Reservas</a></li>
        </ul>
    </nav>

</header>
    <main>
        <section class="principal">
            <?php foreach($sitios as $fila){ ?>
                <div class="sitio">
                    <img src="img/<?php echo $fila["imagen"]; ?>">
                    <div class="descripcion">
                        <h2><?php echo $fila["nombre"]; ?></h2>
                        <p><?php echo $fila["descripcion"]; ?></p>
                    </div>
                </div>
            <?php } ?>
        </section>
    </main>

    <footer><p>"Un rincón de tranquilidad en Torralba"</p></footer>

</body>

</html>