<?php
include("php/config_web.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Consuelo</title>
    <link rel="stylesheet" href="./estilos.css">
    <link rel="stylesheet" href="./responsive.css"  media="screen and (max-width: 768px)">
</head>

<body>
    <header role="banner">
        <div class="cabecera-contenido">
            <img src="img/logo.png" alt="Casa Consuelo" class="logo-cabecera">
            <h1>Casa Consuelo</h1>
            <a href="admin/login.php" class="boton-admin">Iniciar sesión</a>
        </div>

        <nav>
            <ul class="menu-principal">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="galeria.php">Galería</a></li>
                <li><a href="sitios.php">Sitios cercanos</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="reservas.php">Reservas</a></li>
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
                    <!-- FORMULARIO CONTACTO -->

                    <div class="formulario-contacto">
                        <h2>Enviar mensaje</h2>
                        <form action="php/guardar_contacto.php" method="POST">
                            <input type="text" name="nombre" placeholder="Nombre" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <textarea name="mensaje" placeholder="Escribe tu mensaje"required></textarea>
                            <button type="submit">Enviar mensaje</button>
                        </form>
                    </div>

                    <!-- FORMULARIO RESEÑA -->

                    <div class="formulario-reseña">
                        <h2>Deja tu reseña</h2>
                        <form action="php/guardar_resena.php" method="POST">
                            <input type="text" name="nombre" placeholder="Nombre" required>
                            <textarea name="comentario" placeholder="Escribe tu reseña" required></textarea>
                            <input type="number" name="valoracion" min="0" max="10" step="0.1" placeholder="Valoración sobre 10" required>
                            <button type="submit">Publicar reseña</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="reseñas">
                <h1>Reseñas</h1>
                <?php include("php/mostrar_resenas.php"); ?>
            </div>

            <div class="enlace-booking">
                <a href="https://www.booking.com/hotel/es/casa-consuelo-torralba-cuenca.es.html?aid=356980&label=gog235jc-10CAsoRkIdY2FzYS1jb25zdWVsby10b3JyYWxiYS1jdWVuY2FIClgDaEaIAQGYATO4ARfIAQzYAQPoAQH4AQGIAgGoAgG4AvSo6McGwAIB0gIkOGI1MDdkZjAtOTY4NC00MGZhLWI3ZTYtMjdmY2NlOGNlMTc32AIB4AIB&sid=b4f929dae0e2c6829d10e76e5c9b3037&checkin=2026-07-20&checkout=2026-07-22&dest_id=-404565&dest_type=city&dist=0&group_adults=5&group_children=0&hapos=1&hpos=1&no_rooms=1&req_adults=5&req_children=0&room1=A%2CA%2CA%2CA%2CA&sb_price_type=total&soh=1&sr_order=popularity&srepoch=1778572410&srpvid=35fe37793cb600f0&type=total&ucfs=1&" target="_blank">Disponibilidad en Booking</a>
            </div>
        </section>

    </main>

    <footer><p>"Un rincón de tranquilidad en Torralba"</p></footer>
</body>

</html>