<?php
    include("conexion.php");

    $sql = "SELECT * FROM resena ORDER BY id DESC";

    $resultado = mysqli_query($conexion, $sql);

    while($fila = mysqli_fetch_assoc($resultado)) {

        echo '
        <div class="caja-reseña">
            <h3>' . $fila["nombre"] . '</h3>
            <p>' . $fila["comentario"] . '</p>
            <strong>Valoración: ' . $fila["valoracion"] . '/10</strong>
            <br>
            <small>' . date("d/m/Y", strtotime($fila["fecha"])) . '</small>
        </div>';
    }
?>