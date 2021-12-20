<?php
  require("conexion.php");
 ?>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../estilo.css">
      <title>Edificios</title></head>
  <body>
    <div>
      <?php
          $id_edificio = $_POST['id_edificio'];
          $nombre_edificio = $_POST['nombre_edificio'];
          $capacidad_maxima_edificio = $_POST['capacidad_maxima_edificio'];
          $insert = "INSERT INTO edificio (id_edificio, nombre_edificio, capacidad_maxima_edificio) VALUES ('$id_edificio', '$nombre_edificio', '$capacidad_maxima_edificio')";
          $resultado = mysqli_query($conexion,$insert);
          if($resultado)
          {
              header("Location: edificios.php");
          }
          else {
            echo "<h3>REGISTRO FALLIDO</h3>";
          }

      ?>
    </div>
  </body>
</html>