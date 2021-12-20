<?php
  require("conexion.php");
  $id_edificio_recibido=$_GET["seleccionado"];
  $consulta = "SELECT * FROM edificio WHERE id_edificio=$id_edificio_recibido";
  $resultado = mysqli_query($conexion,$consulta);
  
  while($row=mysqli_fetch_assoc($resultado)){
      $id_edificio_recibido = $row["id_edificio"];
      $nombre_edificio_recibido = $row["nombre_edificio"];
      $capacidad_maxima_edificio_recibido = $row["capacidad_maxima_edificio"];
  }
?>


<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edificios</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/estilo_mantenedor.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="https://www.ucsc.cl/">
        <img src="../CSS/logoucsc.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
        Aforo UCSC - Edificio
      </a>
      <a align="center" href="../acceso.php" class="cerrarsesion boton">
        <button value="cerrarsesion" class="btn btn-primary" type="button">Cerrar sesión</button>
      </a>
    </div>
  </nav>

  <div class="container-fluid fondoedificio">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <form action="update-edificio.php" method="POST" class="edicion_edificio">
          <h3 align="center" class="mb-5">Formulario de edición de edificio</h3>
          <input type="hidden" name="id_edificio_oculto" value="<?php echo "$id_edificio_recibido" ?>">                    
          <div class="mb-3">
            <label class="form-label texto_registro">Nombre Edificio</label>
            <input type="text" class="form-control" name="nombre_edificio" value="<?php echo "$nombre_edificio_recibido" ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label texto_registro">Aforo máximo</label>
            <input type="text" class="form-control" name="capacidad_maxima_edificio" value="<?php echo "$capacidad_maxima_edificio_recibido" ?>" required>
          </div>

          <div class="d-grid gap-2 pt-5 boton">
              <button type="submit" value="Guardar" class="btn btn-primary" type="button">Guardar</button>
              <a align="center" href="edificios.php">
                <button value="atras" class="btn btn-primary atras" type="button">Atrás</button>
              </a>
          </div>

        </form>
    </div>
    </div>
  </div>

</body>
</html>
