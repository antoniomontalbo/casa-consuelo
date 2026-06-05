<?php

session_start();


include("php/conexion.php");
include("model/galeria_model.php");

$galeria = new Galeria($conexion);

$imagenes = $galeria->obtenerImagenes();

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

            <a href="view/perfil_view.php" class="boton-admin">Mi Perfil</a>

        <?php } ?>

            <a href="controller/usuario_controller.php?logout=1" class="boton-admin">Cerrar sesión</a>

        <?php }else{ ?>
            <a href="view/login_view.php" class="boton-admin">Iniciar sesión</a>

        <?php } ?>

    </div>

    <nav>
        <ul class="menu-principal">
            <li><a href="index.php?pagina=inicio">Inicio</a></li>
            <li><a href="index.php?pagina=galeria" style="background-color:#976c4e; box-shadow:3px 3px 8px black;">Galería</a></li>
            <li><a href="index.php?pagina=sitios">Sitios cercanos</a></li>
            <li><a href="index.php?pagina=contacto">Contacto</a></li>
            <li><a href="index.php?pagina=reserva">Reservas</a></li>
        </ul>
    </nav>

</header>
    <main role="main" aria-label="Contenido principal">
        <section class="principal">
            <div class="galeria">
                <div class="menu-galeria">
                    <ul class="menu-principal">
                        <li><a href="index.php?pagina=galeria" style="background-color:#976c4e; box-shadow:3px 3px 8px black;">Galería</a></li>
                        <li><a href="index.php?pagina=habitaciones">Habitaciones</a></li>
                        <li><a href="index.php?pagina=banos">Baños</a></li>
                        <li><a href="index.php?pagina=salon">Salón</a></li>
                        <li><a href="index.php?pagina=exterior">Exterior</a></li>
                    </ul>
                </div>

                <div class="galeria-grid" aria-label="Galería de imágenes">
                    <?php foreach($imagenes as $fila){ ?>
                        <img src="img/<?php echo $fila["imagen"]; ?>" alt="Imagen galería">
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>

    <footer role="contentinfo" aria-label="Pie de página">
        <p>"Un rincón de tranquilidad en Torralba"</p>
    </footer>

</body>
</html>