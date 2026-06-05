<?php
include("php/conexion.php");
include("model/configuracion_model.php");

$configuracion = new Configuracion($conexion);

$config = $configuracion->obtenerConfiguracion();
$pagina = "inicio";

if(isset($_GET["pagina"])){
    $pagina = $_GET["pagina"];
}

switch($pagina){

    case "inicio":
        include("view/index_view.php");
    break;

    case "galeria":
        include("view/galeria_view.php");
    break;

    case "banos":
        include("view/galeria-banos_view.php");
    break;

    case "habitaciones":
        include("view/galeria-hab_view.php");
    break;

    case "salon":
        include("view/galeria-salon_view.php");
    break;

    case "exterior":
        include("view/galeria-exterior_view.php");
    break;

    case "sitios":
        include("view/sitios_view.php");
    break;

    case "contacto":
        include("view/contacto_view.php");
    break;

    case "reservas":
        include("view/reservas_view.php");
    break;

    default:
        include("view/index_view.php");

}

?>