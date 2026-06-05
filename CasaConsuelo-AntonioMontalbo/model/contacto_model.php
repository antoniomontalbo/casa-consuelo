<?php

class Contacto{
    private $conexion;
    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    /* GUARDAR MENSAJE */

    public function guardarMensaje($id_usuario,$nombre,$email,$mensaje){
        $fecha = date("Y-m-d");
        $sql = "INSERT INTO contacto
        (
            nombre,
            email,
            mensaje,
            respuesta,
            estado,
            fecha,
            id_usuario
        )
        VALUES
        (
            '$nombre',
            '$email',
            '$mensaje',
            '',
            'pendiente',
            '$fecha',
            '$id_usuario'
        )";
        return mysqli_query($this->conexion,$sql);
    }

    /* OBTENER TODOS */

    public function obtenerMensajes(){
        $sql = "SELECT * FROM contacto ORDER BY id DESC";
        $resultado = mysqli_query($this->conexion,$sql);

        $mensajes = array();

        while($fila = mysqli_fetch_assoc($resultado)){
            $mensajes[] = $fila;
        }
        return $mensajes;
    }

    /* OBTENER MENSAJES USUARIO */

    public function obtenerMensajesUsuario($id_usuario){
        $sql = "SELECT * FROM contacto WHERE id_usuario='$id_usuario' ORDER BY id DESC";

        $resultado = mysqli_query($this->conexion,$sql);
        $mensajes = array();

        while($fila = mysqli_fetch_assoc($resultado)){
            $mensajes[] = $fila;
        }
        return $mensajes;
    }

    /* RESPONDER */

    public function responderMensaje($id,$respuesta){
        $sql = "UPDATE contacto SET respuesta='$respuesta',estado='respondido'
                WHERE id='$id'";
        return mysqli_query($this->conexion,$sql);
    }

    /* ELIMINAR */

    public function eliminarMensaje($id){
        $sql = "DELETE FROM contacto WHERE id='$id'";
        return mysqli_query($this->conexion,$sql);
    }

    /* CONTAR PENDIENTES */

    public function contarPendientes(){
        $sql = "SELECT COUNT(*) total FROM contacto WHERE estado='pendiente'";

        $resultado = mysqli_query($this->conexion,$sql);
        $fila = mysqli_fetch_assoc($resultado);
        return $fila["total"];
    }
}

?>