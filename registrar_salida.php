<?php
    require("conexion.php");
    //include("auth.php"); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Ingreso</title>

    <link rel="stylesheet" href="CSS/estilo_mantenedor.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://www.ucsc.cl/">
                <img src="CSS/logoucsc.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
                Aforo UCSC - Registrar Salida
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active navbarlinks" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbarlinks" href="envivo.php">En Vivo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbarlinks" href="datosanteriores.php">Datos anteriores</a>
                </li>

                <a href="logout.php">
                    <span class="material-icons iconousuario text-black">
                        account_circle
                    </span>
                </a>
            </ul>

        </div>
    </nav>

    <div class="container-fluid fondo">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <h1 align="center">Registrar Salida</h1>
            </div>
            <div class="col" align="center">
                <div class="mantenedor" style="border: solid 2px;">
                    <h1>Personal</h1>
                    <form action="salida.php" method="POST">
                        <input type="text" class="form-control" name="input_run_personal" placeholder="123456789" required>
                        <input class="btn btn-primary mt-3" type="submit" Value="Registrar">
                    </form>
                    <div class="col">
                        <?php
                            echo "<h1>Listado</h1>";
                            $fecha = date('Y-m-d');
                            $consulta = "SELECT * FROM personal, puede WHERE fecha_ingreso='$fecha' and run=run_personal ORDER BY hora_ingreso DESC";
                            $resultado = mysqli_query($conexion,$consulta);
                            echo "<table border=1>";
                                echo "<tr>";
                                    echo "<th>";
                                        echo "Nombre";
                                    echo "</th>";
                                    echo "<th>";
                                        echo "Hora Ingreso";
                                    echo "</th>";
                                    echo "<th>";
                                        echo "Hora Salida";
                                    echo "</th>";
                                echo "</tr>";

                            while($row=mysqli_fetch_assoc($resultado)){
                                $nombre = $row["nombre"];
                                $run = $row["run"];
                                $hora_ingreso = $row["hora_ingreso"];
                                $hora_salida = $row["hora_salida"];
                                echo "<tr>";
                                    echo "<td>";
                                        echo "($run)$nombre";
                                    echo "</td>";
                                    echo "<td>";
                                        echo "$hora_ingreso";
                                    echo "</td>";
                                    echo "<td>";
                                        echo "$hora_salida";
                                    echo "</td>";
                                echo "</tr>"; 
                            }
                            echo "</table>";
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
