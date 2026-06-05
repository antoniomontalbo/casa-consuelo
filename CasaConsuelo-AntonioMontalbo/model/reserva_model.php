<?php
    class Reserva{
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function guardarReserva($f_entrada,$f_salida,$personas,$precio,$id_usuario){
            $estado = "pendiente";
            $f_reserva = date("Y-m-d");
            $sql = "INSERT INTO reserva(f_entrada,f_salida,personas,precio,estado,f_reserva,id_usuario)
                    VALUES('$f_entrada','$f_salida','$personas','$precio','$estado','$f_reserva','$id_usuario')";

            return mysqli_query($this->conexion, $sql);
        }

        public function obtenerReservas(){
            $sql = "SELECT * FROM reserva ORDER BY f_entrada ASC";

            $resultado = mysqli_query($this->conexion, $sql);
            $reservas = array();
            while($fila = mysqli_fetch_assoc($resultado)){
                $reservas[] = $fila;
            }
            return $reservas;
        }

        public function obtenerFechasReservadas(){
            $sql = "SELECT f_entrada, f_salida FROM reserva WHERE estado='confirmada'";
            $resultado = mysqli_query($this->conexion, $sql);
            $reservas = array();
            while($fila = mysqli_fetch_assoc($resultado)){
                $reservas[] = $fila;
            }
            return $reservas;
        }

        public function obtenerReservasUsuario($id_usuario){
            $sql = "SELECT * FROM reserva WHERE id_usuario='$id_usuario' ORDER BY f_entrada ASC";
            $resultado = mysqli_query($this->conexion, $sql);
            $reservas = array();
            while($fila = mysqli_fetch_assoc($resultado)){
                $reservas[] = $fila;
            }
            return $reservas;
        }

        public function eliminarReserva($id){
            $sql = "DELETE FROM reserva WHERE id='$id'";
            return mysqli_query($this->conexion, $sql);
        }

        public function cancelarReserva($id){
            $sql = "UPDATE reserva SET estado='cancelada' WHERE id='$id'";
            return mysqli_query($this->conexion, $sql);
        }

        public function modificarReserva($id,$f_entrada,$f_salida,$personas,$precio){
            $sql = "UPDATE reserva
                    SET f_entrada='$f_entrada',f_salida='$f_salida',personas='$personas',precio='$precio' 
                    WHERE id='$id'";
            return mysqli_query($this->conexion, $sql);

        }
        /* TODAS LAS RESERVAS ADMIN */

        public function obtenerTodasReservas(){
            $sql = "SELECT reserva.*,usuarios.nombre
                    FROM reserva
                    INNER JOIN usuarios
                    ON reserva.id_usuario = usuarios.id
                    ORDER BY reserva.id DESC";
            $resultado = mysqli_query($this->conexion,$sql);
            $reservas = [];

            while($fila = mysqli_fetch_assoc($resultado)){
                $reservas[] = $fila;
            }
            return $reservas;
        }

        /*CONFIRMAR*/
        public function confirmarReserva($id){
            $sql = "UPDATE reserva SET estado='confirmada' WHERE id='$id'";

            return mysqli_query($this->conexion,$sql);
        }

        public function modificarReservaAdmin($id,$entrada,$salida,$personas,$precio,$estado){
            $sql = "UPDATE reserva
                    SET
                    f_entrada='$entrada',
                    f_salida='$salida',
                    personas='$personas',
                    precio='$precio',
                    estado='$estado'
                    WHERE id='$id'";

            return mysqli_query($this->conexion,$sql);
        }
        /* ELIMINAR DEFINITIVAMENTE */

        public function eliminarReservaAdmin($id){
            $sql = "DELETE FROM reserva WHERE id='$id'";
            return mysqli_query($this->conexion,$sql);
        }

    }

?>