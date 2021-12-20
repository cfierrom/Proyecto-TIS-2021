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

                    <div class="col">
                        <img src="CSS/logoucsc.png" alt="" class="logotitulo">
                        <h1 class="titulo">Control de Aforos a Edificios</h1>
                        <h5 class="subtitulo">Medidas de prevención COVID-19 de la UCSC</h5>
                    </div>
                    <div class="row" align="center">
                        <div class="col">
                            <a class="btn btn-outline-secondary _a" href="envivo.php" role="button">Ver en vivo</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-outline-secondary _a" href="ayuda.php" role="button">¿Necesitas ayuda?</a>
                        </div>
                    </div>
                    <div class="row" align="center">
                        <div class="col">
                            <a class="btn btn-outline-secondary _a" href="#" role="button">Ver datos pasados</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-outline-secondary _a" href="https://ayuda.ucsc.cl/" role="button">Reportar problema</a>
                        </div>
                    </div>
                    <div class="row" align="center">
                        <div class="col">
                        <a class="btn btn-outline-secondary _a" href="registrar_ingreso.php" role="button">Registrar Ingreso</a>
                        </div>
                        <div class="col">
                        <a class="btn btn-outline-secondary _a" href="registrar_salida.php" role="button">Registrar Salida</a>
                        </div>
                    </div>
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
