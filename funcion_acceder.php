<?php
    require("conexion.php");

    session_start();
    $usuario = $_POST['input_user'];

    $consulta = "SELECT * FROM personal WHERE run=$usuario";
    $resultado = mysqli_query($conexion,$consulta);

    while($row=mysqli_fetch_assoc($resultado)){
        $rol = $row['cargo'];
        if($rol == "Administrativo"){
            $_SESSION['input_user'] = $usuario;
            header('Location: index_manten.php');
        }else{
            echo 'El run no es administrador';
        }
    }
?>
