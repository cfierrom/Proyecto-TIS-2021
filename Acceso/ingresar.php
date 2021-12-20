<?php
    require("../conexion.php");

    $rut_recibido= $_POST["rut_acceso"];
    $edificio_recibido= $_POST["edificio_acceso"];
    $fecha_in_recibido= $_POST["fecha_acceso"];
    $hora_in_recibido= $_POST["hora_ingreso"];
    $hora_out_recibido= $_POST["hora_salida"];

    $sql = "INSERT INTO puede (run_personal, id_edificio, fecha_ingreso, hora_ingreso, hora_salida) VALUES ('$rut_recibido','$edificio_recibido','$fecha_in_recibido','$hora_in_recibido','$hora_out_recibido') ";
    $resultado = mysqli_query($conexion,$sql);
    header('Location: indexacceso.php');


?>