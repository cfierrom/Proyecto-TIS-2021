<?php
    require("conexion.php");
    $run_personal_recibido = $_POST["input_run_oculto"];
    $nombre_personal_recibido = $_POST["input_nombre_personal"];
    $cargo_personal_recibido = $_POST["input_cargo_personal"];
    
    $sql = "UPDATE personal SET nombre='$nombre_personal_recibido', cargo= '$cargo_personal_recibido' WHERE run = '$run_personal_recibido' ";
    $resultado = mysqli_query($conexion, $sql);
    header('Location: index_personal.php');
?>