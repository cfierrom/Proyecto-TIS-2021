<?php
    require("conexion.php");
    //include("auth.php"); 

    // cantidad actual
    $fechaactual = date('Y-m-d');
    $queryenvivo = "SELECT run_personal FROM `puede` WHERE fecha_ingreso = '$fechaactual'";
    $resultadoenvivo=mysqli_query($conexion,$queryenvivo);
    $numero = mysqli_num_rows($resultadoenvivo);

    //
        
    // capacidad total edificios
    $queryenvivocaptotal= "SELECT capacidad_maxima_edificio FROM `edificio`";
    $resultadoenvivocaptotal=mysqli_query($conexion,$queryenvivocaptotal);

    $numerocaptotal = 0;
    while($row=mysqli_fetch_assoc($resultadoenvivocaptotal)){
        $numerocaptotal += $row['capacidad_maxima_edificio'];
    }

    // alumno
    $queryenvivoalum = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='alumno' 
                        AND fecha_ingreso = '$fechaactual'";
    $resultadoenvivoalum=mysqli_query($conexion,$queryenvivoalum);
    $numeroalum = mysqli_num_rows($resultadoenvivoalum);
    
    // docente
    $queryenvivodoc = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Docente' 
                        AND fecha_ingreso = '$fechaactual'";
    $resultadoenvivodoc=mysqli_query($conexion,$queryenvivodoc);
    $numerodoc = mysqli_num_rows($resultadoenvivodoc);

    // Administrativo
    $queryenvivoadm = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Administrativo' 
                        AND fecha_ingreso = '$fechaactual'";
    $resultadoenvivoadm=mysqli_query($conexion,$queryenvivoadm);
    $numeroadm = mysqli_num_rows($resultadoenvivoadm);

    // Auxiliar
    $queryenvivoaux = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Auxiliar aseo' 
                        AND fecha_ingreso = '$fechaactual'";
    $resultadoenvivoaux=mysqli_query($conexion,$queryenvivoaux);
    $numeroaux = mysqli_num_rows($resultadoenvivoaux);

    // Mantención
    $queryenvivoman= "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Mantencion' 
                        AND fecha_ingreso = '$fechaactual'";
    $resultadoenvivoman=mysqli_query($conexion,$queryenvivoman);
    $numeroman = mysqli_num_rows($resultadoenvivoman);

    // Seguridad
    $queryenvivoseg = "SELECT run_personal FROM `puede`,`personal` WHERE run_personal = run AND cargo='Seguridad' 
                        AND fecha_ingreso = (select CURDATE()) AND hora_ingreso < (SELECT curTime()) AND (SELECT curTime()) < hora_salida";
    $resultadoenvivoseg=mysqli_query($conexion,$queryenvivoseg);
    $numeroseg = mysqli_num_rows($resultadoenvivoseg);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <link rel="stylesheet" href="CSS/estilo_mantenedor.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Aforo UCSC - En vivo</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="JS/funcion_datoant.js"></script>
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
                Aforo UCSC - En vivo
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

                <a href="acceso.php">
                    <span class="material-icons iconousuario text-black">
                        account_circle
                    </span>
                </a>
            </ul>
        </div>
    </nav>

    <div class="container-fluid fondoportal">
        <div class="row capacontainer">
            <div class="col-lg-12">
                <div class="container contenedor_envivo">
                        <!--Borrar --cantidad-- -->
                        <h2 name="cantidad" class="cantidad_envivo"><?php echo $numero?></h2>
                        <h4>Personas actualmente</h4>
                </div>
            </div>
            
            <div class="container-fluid">
                <button onclick="mostrargrafico()" value="mostgrafico" class="btn btn-primary mb-4 botongrafico" type="button">Mostrar gráfico</button>
                <div class="row contenedor_datosenvivo">
                    <div id="graph">
                        <canvas id="myChart" width="400" height="50" class="mb-5"></canvas>
                        <script>
                        const ctx = document.getElementById('myChart').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Alumnos', 
                                'Docentes', 'Administrativos', 'Auxiliar', 'Mantención', 'Seguridad'],
                                datasets: [{
                                    label: 'Gráfico en vivo',
                                    data: [<?php echo "$numeroalum"?>,<?php echo "$numerodoc"?>, <?php echo "$numeroadm"?>, <?php echo "$numeroaux"?>,<?php echo "$numeroman"?>, <?php echo "$numeroseg"?>],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                        </script>
                    </div>
                    
                    <div class="col-lg-3 col-md-5 col-sm-7">
                        
                            <h3>Capacidad total</h3>
                            <h3>Aforo máximo</h3>
                            <h3>Tiempo aforo máx.</h3>
                            <h3>Alumnos</h3>
                            <h3>Docentes</h3>
                            <h3>Administrativos</h3>
                        
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-5">
                        <h3><?php echo "$numerocaptotal"?> Personas</h3>
                        <h3><?php echo ""?> Personas</h3>
                        <h3><?php echo ""?> Minutos</h3>
                        <h3><?php echo "$numeroalum"?> Personas</h3>
                        <h3><?php echo "$numerodoc"?> Personas</h3>
                        <h3><?php echo "$numeroadm"?> Personas</h3>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-7">
                        <h3>Tiempo aforo mín.</h3>
                        <h3>Auxiliar</h3>
                        <h3>Mantención</h3>
                        <h3>Seguridad</h3>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-5">
                        <h3><?php echo ""?> Minutos</h3>
                        <h3><?php echo "$numeroaux"?> Personas</h3>
                        <h3><?php echo "$numeroman"?> Personas</h3>
                        <h3><?php echo "$numeroseg"?> Personas</h3>
                    </div>
                </div>
            </div>
            <center>
                <div class="row" align="center">
                    <div class="scroll_vertical" align="center">
                        <div class="col manten container-fluid" style="border: solid 2px;">
                            <?php
                                echo "<h1>Listado</h1>";
                                
                                
                                echo "<table border=1>";
                                    echo "<tr>";
                                        echo "<th>";
                                            echo "Nombre";
                                        echo "</th>";
                                        echo "<th>";
                                            echo "Edificio";
                                        echo "</th>";
                                        echo "<th>";
                                            echo "Fecha";
                                        echo "</th>";
                                        echo "<th>";
                                            echo "Hora Ingreso";
                                        echo "</th>";
                                        echo "<th>";
                                            echo "Hora Salida";
                                        echo "</th>";
                                    echo "</tr>";
                                    $query = "SELECT * FROM personal, puede, edificio WHERE personal.run = puede.run_personal and puede.id_edificio = edificio.id_edificio ORDER BY hora_ingreso, fecha_ingreso DESC";
                                    $res = mysqli_query($conexion,$query);

                                while($row=mysqli_fetch_assoc($res)){
                                    $nombre = $row["nombre"];
                                    $run = $row["run"];
                                    $edificio = $row["nombre_edificio"];
                                    $hora_ingreso = $row["hora_ingreso"];
                                    $hora_salida = $row["hora_salida"];
                                    $fecha = $row["fecha_ingreso"];
                                    echo "<tr>";
                                        echo "<td>";
                                            echo "($run)$nombre";
                                        echo "</td>";
                                        echo "<td>";
                                            echo "$edificio";
                                        echo "</td>";
                                        echo "<td>";
                                            echo "$fecha";
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
            </center>
            <div class="col-lg-12">
                <footer class="footerenvivo">
                    <p class="textofooterenvivo">Unidad de Infraestructura DO - UCSC. Todos los derechos reservados 2021
                        <span class="material-icons copyenvivo">
                            copyright
                        </span>
                    </p>
                    <a href="https://portal.ucsc.cl/">
                        <label class="linkfooterenvivo">Ir a Portal Institucional</label>
                    </a>
                </footer>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
