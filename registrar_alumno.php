<?php
    require("conexion.php");

    $run=$_POST["input_run"];
    $nombre=$_POST["input_nombre"];
    $rol="Alumno";
    $consulta="SELECT run FROM personal WHERE run = '$run'";

    if(empty(mysqli_fetch_assoc(mysqli_query($conexion,$consulta)))){
        $query="INSERT INTO personal(run,nombre,cargo) VALUES('$run','$nombre','$rol')";
        if(mysqli_query($conexion,$query)){
            echo"<script language='javascript'>alert('Creación exitoso');</script>";
            header("Location: registrar_ingreso.php");
        }
    }else{
        echo "<p>El Run existe, <a href='registrar_ingreso.php'>ingresar acceso a edificio</a></p>";
    }
?>