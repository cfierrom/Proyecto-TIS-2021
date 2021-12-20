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
    <title>Aforo UCSC - Datos anteriores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="JS/funcion_datoant.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://www.ucsc.cl/">
                <img src="CSS/logoucsc.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
                Aforo UCSC - Datos anteriores
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

    <div class="container-fluid fondodatosanteriores">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-4"></div>
            <div class="col-lg-6 col-md-7 col-sm-8 margen_fecha">
                <form action="datosanteriores.php" method="POST">
                    <select name="input_nombre_edificio" class="edificios_datosant mb-2">
                        <?php
                            $querydatosant= "SELECT * FROM `edificio`";
                            $resultadodatosant=mysqli_query($conexion,$querydatosant);
                            
                            while($row=mysqli_fetch_assoc($resultadodatosant)){
                                $nombre_edificio_recibido = $row["nombre_edificio"];
                                $capacidad_maxima_edificio = $row["capacidad_maxima_edificio"];
                                $id_edificio = $row["id_edificio"];
                        
                                echo "<option value='$id_edificio'>$nombre_edificio_recibido</option>";
                            }
                        ?>
                    </select>
                    
                    <br>
                    <div class="form-check d-inline-flex me-1 mb-3 mt-2">
                        <input onclick="mostrardia()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label ps-1" for="flexRadioDefault1">
                            Día
                        </label>
                    </div>
                    <div class="form-check d-inline-flex me-1">
                        <input onclick="mostrarsemana()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label ps-1" for="flexRadioDefault2">
                            Semana
                        </label>
                    </div>
                    <div class="form-check d-inline-flex">
                        <input onclick="mostrarmes()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                        <label class="form-check-label ps-1" for="flexRadioDefault3">
                            Mes
                        </label>
                    </div>
                    <br>
                    <input id="dia" type="date" name="dia_elegido">
                    <input id="semana" type="WEEK" name="semana_elegido" >
                    <input id="mes" type="MONTH" name="mes_elegido" >
                    <button onclick="search()" type="submit" value="buscar" class="btn btn-primary mb-4 buscar" type="button">Buscar</button>
                </form>
            </div>
        </div>

        <div class="row contenedor_datosanteriores">  
            <div class="col-lg-12 col-md-12 col-sm-12">
                <img src="CSS/logoucsc.png" alt="" class="logodatosant">
            </div>
            <div class="col-lg-6 col-md-8 col-sm-7 margendatosant">
                <h3>Nombre edificio</h3>
                <h3>Capacidad edificio</h3>
                <h3>Aforo máximo</h3>
                <h3>Tiempo aforo máx.</h3>
                <h3>Fecha</h3>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-5">
                <?php
                    $id_edificio = $_POST["input_nombre_edificio"];
                    $query= "SELECT * FROM edificio WHERE id_edificio = '$id_edificio'";
                    $resultado=mysqli_query($conexion,$query);

                    $consul="SELECT * FROM edificio, puede WHERE edificio.id_edificio = '$id_edificio' and puede.id_edificio='$id_edificio'";
                    $res=mysqli_query($conexion,$consul);
                    $cuenta=mysqli_num_rows($res);
                    
                    $row=mysqli_fetch_assoc($resultado);
                    $nombre_edificio_sel = $row['nombre_edificio'];
                    $capacidad_maxima_sel = $row['capacidad_maxima_edificio'];

                    echo "<h3 align='center'>$nombre_edificio_sel</h3>";
                    echo "<h3 align='center'>$capacidad_maxima_sel</h3>";
                    echo "<h3 align='center'>$cuenta</h3>";
                    echo "<h3 align='center'>TIEMPO AFORO MÁXIMO</h3>";
                    echo "<h3 align='center'>FECHA</h3>";
                ?>
            </div>
            <a align="center" href="#" class="boton mt-5">
                <button value="imprimir" class="btn btn-primary" type="button">Imprimir</button>
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
