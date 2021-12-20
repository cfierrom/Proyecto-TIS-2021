<?php
    require("conexion.php");

    $id_edificio = $_POST['input_edificio'];
    $run = $_POST['input_run_personal'];

    $query = "INSERT INTO puede(run_personal, id_edificio, fecha_ingreso, hora_ingreso) VALUES('$run', '$id_edificio', now(), now())";

    if(mysqli_query($conexion,$query)){
        header("Location: index.php");
    }
?>