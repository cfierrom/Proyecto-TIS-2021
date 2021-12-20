<?php
    require("conexion.php");

    $run_personal_recibido=$_GET["seleccionado"];
    $sql = "DELETE FROM personal WHERE run='$run_personal_recibido'";
    $datos = "DELETE FROM puede WHERE run_personal='$run_personal_recibido'";
    if(mysqli_query($conexion,$datos)){  
        if(mysqli_query($conexion,$sql)){
            header('Location: index_personal.php');
        }
    }
?>