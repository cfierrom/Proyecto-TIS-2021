<?php
    require("conexion.php");

    $run = $_POST['input_run_personal'];

    $query = "UPDATE puede SET hora_salida=now() WHERE run_personal=$run";

    if(mysqli_query($conexion,$query)){
        header("Location: index.php");
    }
?>