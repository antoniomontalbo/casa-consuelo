<?php

class Sitio{
    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    public function obtenerSitios(){
        $sql = "SELECT * FROM sitios_cercanos";
        $resultado = mysqli_query($this->conexion,$sql);
        $sitios = [];

        while($fila = mysqli_fetch_assoc($resultado)){
            $sitios[] = $fila;
        }
        return $sitios;
    }

    public function insertarSitio($nombre,$descripcion,$imagen){
        $sql = "INSERT INTO sitios_cercanos(nombre,descripcion,imagen)
                VALUES('$nombre','$descripcion','$imagen')";

        return mysqli_query($this->conexion,$sql);
    }

    public function obtenerSitio($id){
        $sql = "SELECT * FROM sitios_cercanos WHERE id='$id'";

        $resultado = mysqli_query($this->conexion,$sql);
        return mysqli_fetch_assoc($resultado);
    }

    public function modificarSitio($id,$nombre,$descripcion){
        $sql = "UPDATE sitios_cercanos SET nombre='$nombre',descripcion='$descripcion'
                WHERE id='$id'";

        return mysqli_query($this->conexion,$sql);
    }
    public function eliminarSitio($id){
        $sql = "DELETE FROM sitios_cercanos WHERE id='$id'";
        return mysqli_query($this->conexion,$sql);
    }

}

?>