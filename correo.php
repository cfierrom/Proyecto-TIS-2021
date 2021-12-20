<?php
    require("conexion.php");

    $correo=$_POST["mail"];
    $texto=$_POST["msg"];
    $asunto=$_POST["subject"];
    $header="From: $correo";
    $destino="camilo.fierro@ucsc.cl";
    if(mail($destino,$asunto,$texto,$header)){
        header("Location: ayuda.php");
    }else{
        echo "<p>Error en el envío</p><br>";
        echo "<a href='ayuda.php' class='btn btn-primary btn-lg disabled' tabindex='-1' role='button' aria-disabled='true'>Volver a intentar</a>";
    }
    
?>