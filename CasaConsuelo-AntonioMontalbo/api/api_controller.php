<?php

include("../php/conexion.php");
include("../model/reserva_model.php");
include("../model/resena_model.php");
include("../model/sitio_model.php");
include("../model/usuario_model.php");
include("../model/galeria_model.php");

class ApiController{

    /* RESERVAS */

    public function reservas(){
        global $conexion;
        $reserva = new Reserva($conexion);
        $datos = $reserva->obtenerReservas();

        header("Content-Type: application/json");

        echo json_encode($datos);

    }

    /* RESEÑAS */

    public function resenas(){
        global $conexion;
        $resena = new Resena($conexion);
        $datos = $resena->obtenerResenas();

        header("Content-Type: application/json");

        echo json_encode($datos);

    }

    /* SITIOS */

    public function sitios(){
        global $conexion;
        $sitio = new Sitio($conexion);
        $datos = $sitio->obtenerSitios();

        header("Content-Type: application/json");

        echo json_encode($datos);
    }

    /* CLIENTES */

    public function clientes(){
        global $conexion;
        $sql = "SELECT id, nombre, email, telefono, rol, fecha_registro FROM usuarios";
        $resultado = mysqli_query($conexion,$sql);
        $clientes = [];

        while($fila = mysqli_fetch_assoc($resultado)){
            $clientes[] = $fila;
        }

        header("Content-Type: application/json");

        echo json_encode($clientes);

    }

    /* GALERIA */

    public function galeria(){
        global $conexion;
        $galeria = new Galeria($conexion);
        $datos = $galeria->obtenerImagenes();

        header("Content-Type: application/json");

        echo json_encode($datos);

    }

}