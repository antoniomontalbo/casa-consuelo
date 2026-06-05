<?php

session_start();

if(!isset($config)){

    include("php/conexion.php");
    include("model/configuracion_model.php");

    $configuracion = new Configuracion($conexion);
    $config = $configuracion->obtenerConfiguracion();

}

if(!isset($_SESSION["id"])){
    header("Location: view/login_view.php");
    exit();

}

include("php/conexion.php");

$configuracion = new Configuracion($conexion);
$config = $configuracion->obtenerConfiguracion();

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
                <a href="view/login_view.php" class="boton-admin">Iniciar sesión</a>
        <?php } ?>

    </div>

    <nav>

        <ul class="menu-principal">
            <li><a href="index.php?pagina=inicio">Inicio</a></li>
            <li><a href="index.php?pagina=galeria">Galería</a></li>
            <li><a href="index.php?pagina=sitios">Sitios cercanos</a></li>
            <li><a href="index.php?pagina=contacto">Contacto</a></li>
            <li><a href="index.php?pagina=reservas" style="background-color:#976c4e; box-shadow:3px 3px 8px black;">Reservas</a></li>
        </ul>

    </nav>

</header>

    <main>

        <section class="principal">

            <h1>Reserva tu estancia</h1>
            <div class="contenedor-reservas">
                <div class="col-formulario">
                    <form action="controller/reservas_controller.php" method="POST">
                        <input type="hidden" name="reservar" value="1">
                        <h2>Selecciona las fechas</h2>
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
    <script>
        let precioBase = <?php echo $config["precio_base"]; ?>;
    </script>

    
    <script src="js/reservas.js?v=999"></script>
    
</body>
</html>