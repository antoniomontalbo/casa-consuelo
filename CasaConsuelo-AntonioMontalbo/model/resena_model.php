<?php

class Resena{
    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    /* GUARDAR RESEÑA */

    public function guardarResena($id_usuario,$nombre,$comentario,$valoracion){
        $fecha = date("Y-m-d");
        $sql = "INSERT INTO resena
        (
            nombre,
            comentario,
            valoracion,
            fecha,
            id_usuario
        )
        VALUES
        (
            '$nombre',
            '$comentario',
            '$valoracion',
            '$fecha',
            '$id_usuario'
        )";

        return mysqli_query($this->conexion,$sql);
    }

    /* OBTENER RESEÑAS */

    public function obtenerResenas(){
        $sql = "SELECT * FROM resena ORDER BY id DESC";

        $resultado = mysqli_query($this->conexion,$sql);
        $resenas = array();

        while($fila = mysqli_fetch_assoc($resultado)){
            $resenas[] = $fila;
        }
        return $resenas;
    }

    /* ELIMINAR */

    public function eliminarResena($id){
        $sql = "DELETE FROM resena WHERE id='$id'";
        return mysqli_query($this->conexion,$sql);
    }
}

?>