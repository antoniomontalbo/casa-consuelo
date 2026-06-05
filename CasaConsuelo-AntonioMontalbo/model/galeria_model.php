<?php

class Galeria{
    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    public function obtenerImagenes(){
        $sql = "SELECT * FROM galeria ORDER BY id DESC";
        $resultado = mysqli_query($this->conexion,$sql);
        $imagenes = [];

        while($fila=mysqli_fetch_assoc($resultado)){
            $imagenes[] = $fila;
        }
        return $imagenes;
    }

    public function guardarImagen($imagen){
        $sql = "INSERT INTO galeria(imagen) VALUES('$imagen')";
        return mysqli_query($this->conexion,$sql);
    }

    public function eliminarImagen($id){
        $sql = "DELETE FROM galeria WHERE id='$id'";
        return mysqli_query($this->conexion,$sql);
    }

}

?>