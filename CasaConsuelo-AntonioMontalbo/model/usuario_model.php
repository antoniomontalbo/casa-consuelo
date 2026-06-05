<?php
    class Usuario{
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        /* REGISTRAR USUARIO */

        public function registrarUsuario($nombre,$email,$contrasena,$telefono){
            $rol = "cliente";
            $fecha_registro = date("Y-m-d");
            $sql = "INSERT INTO usuarios(nombre,email,contrasena,telefono,rol,fecha_registro)
                    VALUES ('$nombre','$email','$contrasena','$telefono','$rol','$fecha_registro')";

            return mysqli_query($this->conexion,$sql);

        }

        /* BUSCAR EMAIL */

        public function buscarEmail($email){
            $sql = "SELECT * FROM usuarios WHERE email='$email'";

            $resultado = mysqli_query($this->conexion,$sql);
            return mysqli_num_rows($resultado);
        }

        /* LOGIN */

        public function loginUsuario($email,$contrasena){
            $sql = "SELECT * FROM usuarios WHERE email='$email' AND contrasena='$contrasena'";
            $resultado = mysqli_query($this->conexion,$sql);

            return mysqli_fetch_assoc($resultado);
        }

        /* OBTENER USUARIO */

        public function obtenerUsuario($id){
            $sql = "SELECT * FROM usuarios WHERE id='$id'";
            $resultado = mysqli_query($this->conexion,$sql);

            return mysqli_fetch_assoc($resultado);

        }

    }

?>