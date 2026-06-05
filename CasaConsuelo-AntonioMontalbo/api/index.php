<?php

include("api_controller.php");

$uri = parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);

$uri = trim($uri, "/");

$partes = explode("/", $uri);

$accion = end($partes);

$api = new ApiController();

if($accion != null && method_exists($api, $accion)){
    $api->$accion();
}
else{
    echo "API Casa Consuelo";
}