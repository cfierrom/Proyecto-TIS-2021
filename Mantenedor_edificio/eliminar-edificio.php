<?php
    require("conexion.php");
    
    $id_edificio = $_GET['seleccionado'];
    $delete = "DELETE FROM edificio WHERE id_edificio = '$id_edificio'";
    $datos = "DELETE FROM puede WHERE id_edificio='$id_edificio'";

    if(mysqli_query($conexion, $datos)){
        if(mysqli_query($conexion, $delete)){
            header("Location: edificios.php");
        }
    }
?>