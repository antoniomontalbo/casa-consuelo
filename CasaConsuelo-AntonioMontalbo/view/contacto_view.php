<?php

    if(!isset($config)){
        include("php/conexion.php");
        include("model/configuracion_model.php");

        $configuracion = new Configuracion($conexion);
        $config = $configuracion->obtenerConfiguracion();

    }

    session_start();

    if(!isset($_SESSION["id"])){
        header("Location: view/login_view.php");
        exit();

    }
    include("php/conexion.php");
    include("model/resena_model.php");

    $resena = new Resena($conexion);
    $resenas = $resena->obtenerResenas();
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
            <li><a href="index.php?pagina=galeria">Galería</a></li>
            <li><a href="index.php?pagina=sitios">Sitios cercanos</a></li>
            <li><a href="index.php?pagina=contacto" style="background-color:#976c4e; box-shadow:3px 3px 8px black;">Contacto</a></li>
            <li><a href="index.php?pagina=reservas">Reservas</a></li>
        </ul>
    </nav>

</header>
    <main>
        <section class="principal">
            <!-- CONTACTO -->

            <div class="contacto-info">
                <!-- IZQUIERDA -->

                <div class="mapa">
                    <img src="img/mapa.png" alt="Mapa de ubicación">
                </div>

                <!-- DERECHA -->

                <div class="datos-contacto">
                    <h1>Contacto</h1>
                    <p>
                        <strong>Dirección:</strong>
                        <?php echo $config["direccion"]; ?>
                    </p>

                    <p>
                        <strong>Localidad:</strong>
                        <?php echo $config["localidad"]; ?>
                    </p>

                    <p>
                        <strong>Teléfono:</strong>
                        <?php echo $config["telefono"]; ?>
                    </p>

                    <p>
                        <strong>Email:</strong>
                        <?php echo $config["email"]; ?>
                    </p>

                    <br><br>

                    <h1>Cómo llegar</h1>

                    <p>
                        Casa Consuelo se encuentra en el centro del municipio,
                        con fácil acceso desde carretera.
                    </p>
                    

                    <div class="formulario-contacto">
                        <h2>Enviar mensaje</h2>
                        <form action="controller/usuario_controller.php" method="POST" onsubmit="return validarContacto()">
                            <input type="hidden" name="enviar_mensaje" value="1">
                            <input type="text" id="nombreContacto" name="nombre" placeholder="Nombre" required>
                            <input type="email" id="emailContacto"name="email" placeholder="Email" required>
                            <textarea name="mensaje" id="mensajeContacto" placeholder="Escribe tu mensaje"required></textarea>
                            <button type="submit">Enviar mensaje</button>
                        </form>
                    </div>

                
                    <div class="formulario-reseña">
                        <h2>Deja tu reseña</h2>
                        <form action="controller/usuario_controller.php" method="POST" onsubmit="return validarResena()">
                            <input type="hidden" name="guardar_resena" value="1">
                            <input type="text" id="nombreResena" name="nombre" placeholder="Nombre" required>
                            <textarea name="comentario" id="comentarioResena" placeholder="Escribe tu reseña" required></textarea>
                            <input type="number" id="valoracionResena" name="valoracion" min="0" max="10" step="0.1" placeholder="Valoración sobre 10" required>
                            <button type="submit">Publicar reseña</button>
                        </form>
                    </div>
                </div>
            </div>

        <div class="reseñas">

            <h1>Reseñas</h1>

            <?php foreach($resenas as $fila){ ?>

            <div class="caja-reseña">
                <h3>
                    <?php echo $fila["nombre"]; ?>

                </h3>

                <p>
                    <?php echo $fila["comentario"]; ?>
                </p>

                <strong>
                    Valoración:
                    <?php echo $fila["valoracion"]; ?>/10
                </strong>

                <br>

                <small>
                    <?php echo $fila["fecha"]; ?>
                </small>
            </div>


            <?php

            }

            ?>

        </div>

        <div class="enlace-booking">
            <a href="https://www.booking.com/hotel/es/casa-consuelo-torralba-cuenca.es.html?aid=356980&label=gog235jc-10CAsoRkIdY2FzYS1jb25zdWVsby10b3JyYWxiYS1jdWVuY2FIClgDaEaIAQGYATO4ARfIAQzYAQPoAQH4AQGIAgGoAgG4AvSo6McGwAIB0gIkOGI1MDdkZjAtOTY4NC00MGZhLWI3ZTYtMjdmY2NlOGNlMTc32AIB4AIB&sid=b4f929dae0e2c6829d10e76e5c9b3037&checkin=2026-07-20&checkout=2026-07-22&dest_id=-404565&dest_type=city&dist=0&group_adults=5&group_children=0&hapos=1&hpos=1&no_rooms=1&req_adults=5&req_children=0&room1=A%2CA%2CA%2CA%2CA&sb_price_type=total&soh=1&sr_order=popularity&srepoch=1778572410&srpvid=35fe37793cb600f0&type=total&ucfs=1&" target="_blank">Disponibilidad en Booking</a>
        </div>
        </section>

    </main>
    <script src="js/validaciones.js"></script>
    <footer><p>"Un rincón de tranquilidad en Torralba"</p></footer>
</body>

</html>