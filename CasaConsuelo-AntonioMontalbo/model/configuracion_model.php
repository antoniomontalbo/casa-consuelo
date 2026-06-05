<?php

class Configuracion{
    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    /* OBTENER CONFIGURACION */

    public function obtenerConfiguracion(){
        $sql = "SELECT * FROM configuracion LIMIT 1";
        $resultado = mysqli_query($this->conexion,$sql);
        return mysqli_fetch_assoc($resultado);
    }

    /* ACTUALIZAR CONFIGURACION */

    public function actualizarConfiguracion($direccion,$localidad,$telefono,$email,$precio_base,$color_web,$fuente_web,$tamano_fuente){
        $sql = "UPDATE configuracion
                SET direccion='$direccion',
                    localidad='$localidad',
                    telefono='$telefono',
                    email='$email',
                    precio_base='$precio_base',
                    color_web='$color_web',
                    fuente_web='$fuente_web',
                    tamano_fuente='$tamano_fuente'
                WHERE id_configuracion='0'";

        return mysqli_query($this->conexion,$sql);
    }
}

?>