<?php
    require("conexion.php");
    //include("auth.php"); 
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aforo UCSC</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://www.ucsc.cl/">
                <img src="CSS/logoucsc.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
                Aforo UCSC
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
    
    <div class="container-fluid fondoportal">
        <div class="row capacontainer">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="container contenedor">
                    <form action="correo.php" method="POST">
                        <h2>Contáctate con Nosotros</h2>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Ingrese su Correo</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nombre@ejemplo.com" name="mail">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Asunto</label>
                            <input type="subject" class="form-control" id="exampleFormControlInput1" name="subject">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Ingrese sus Comentarios y Sugerencias</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="msg"></textarea>
                        </div>
                        <div class="row">
                            <div class="col"><input class="btn btn-primary" type="submit" value="Enviar"></div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <footer>
                    <p class="textofooter">Unidad de Infraestructura DO - UCSC. Todos los derechos reservados 2021
                        <span class="material-icons copy">
                            copyright
                        </span>
                    </p>
                    <a href="https://portal.ucsc.cl/">
                        <label class="linkfooter">Ir a Portal Institucional</label>
                    </a>
                </footer>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
