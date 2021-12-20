<?php
    require("conexion.php");

    $id_edificio = $_POST['id_edificio_oculto'];
    $nombre_edificio = $_POST['nombre_edificio'];
    $capacidad_maxima_edificio = $_POST['capacidad_maxima_edificio'];
    $update = "UPDATE edificio SET nombre_edificio = '$nombre_edificio', capacidad_maxima_edificio = '$capacidad_maxima_edificio' WHERE id_edificio = '$id_edificio'";
    $resultado = mysqli_query($conexion, $update);
    if($resultado)
    {
        header("Location: edificios.php");
    }
    else {
      echo "<h3>UPDATE FALLIDO</h3>";
    }
?>