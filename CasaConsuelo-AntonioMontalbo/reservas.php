<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Consuelo</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="./responsive.css"  media="screen and (max-width: 768px)">
</head>

<body>
    <header>
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

            <h1>Reserva tu estancia</h1>
            <div class="contenedor-reservas">
                <div class="col-formulario">
                    <form action="php/guardar_reserva.php" method="POST">
                        <label><strong>Nombre</strong></label>
                        <input type="text" name="nombre" required>

                        <label><strong>DNI</strong></label>
                        <input type="text" name="dni" required>

                        <label><strong>Email</strong></label>
                        <input type="email" name="email" required>

                        <label><strong>Teléfono</strong></label>
                        <input type="text" name="telefono" required>

                        <h2>Selecciona las fechas</h2>
                        <br>

                        <div id="calendario"></div>
                        <input type="hidden" name="f_entrada" id="f_entrada">
                        <input type="hidden" name="f_salida" id="f_salida">
                        <p id="textoFechas"></p>
                        <label>Personas:</label>
                        <select name="personas" id="personas">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                        </select>
                        <h2 id="precio">Precio total: 0€</h2>
                        <input type="hidden" name="precio" id="precioOculto">
                        <button type="submit" class="boton-reserva">Reservar</button>
                    </form>
                </div>

                <div class="col-imagen">
                    <img src="img/reserva.jpg" alt="Casa Consuelo">
                </div>
            </div>
        </section>

    </main>

    <script src="js/reservas.js"></script>

</body>
</html>