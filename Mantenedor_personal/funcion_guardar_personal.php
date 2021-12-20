<?php
    require("conexion.php");

    $run_personal_recibido= $_POST["input_run_personal"];
    $nombre_personal_recibido= $_POST["input_nombre_personal"];
    $cargo_personal_recibido= $_POST["input_cargo_personal"];


    $sql = "INSERT INTO personal (run, nombre, cargo) VALUES ('$run_personal_recibido', '$nombre_personal_recibido', '$cargo_personal_recibido')";
    $resultado = mysqli_query($conexion,$sql);
    header('Location: index_personal.php');
?>