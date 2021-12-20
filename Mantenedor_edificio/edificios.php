<?php
  require("conexion.php");
 ?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edificios</title></head>
  
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

      <div class="col-lg-6 col-md-12 col-sm-12">
        <form action="insertar-edificio.php" method="POST" class="formulario_edificio">
          <h3 align="center" class="mb-5">Formulario de registro de edificio</h3>
          <div class="mb-3">
            <label class="form-label texto_registro">Nombre Edificio</label>
            <input type="text" class="form-control" name="nombre_edificio" placeholder="Facultad de ingenieria" required>
          </div>
          <div class="mb-3">
            <label class="form-label texto_registro">Aforo Maximo</label>
            <input type="text" class="form-control" name="capacidad_maxima_edificio" placeholder="999999" required>
          </div>
          <div class="d-grid gap-2 pt-4 boton">
            <button type="submit" value="Guardar" class="btn btn-primary" type="button">Guardar</button>
            <a align="center" href="../index_manten.php">
              <button value="atras" class="btn btn-primary atras" type="button">Atrás</button>
            </a>
          </div>
        </form>
      </div>
      
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="listado_edificio">
          <table class="table table-bordered border-primary texto_listado">
            <h3 align="center" class="mb-5">Listado de Edificios</h3>
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Aforo máximo</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            
            <tbody>
              <?php
              $consulta = "SELECT * FROM edificio";
              $resultado = mysqli_query($conexion, $consulta);
              
              while($row=mysqli_fetch_assoc($resultado)){
                $id_edificio_recibido = $row['id_edificio'];
                $nombre_edificio = $row['nombre_edificio'];
                $capacidad_maxima_edificio = $row['capacidad_maxima_edificio'];
                echo "<tr>";
                echo "<td>".$nombre_edificio."</td>";
                echo "<td>".$capacidad_maxima_edificio."</td>";
                echo "<td>
                        <a class='boton' href='eliminar-edificio.php?seleccionado=".$id_edificio_recibido."'>
                          <button value='eliminar' class='btn btn-primary' type='button'>Eliminar</button>
                        </a>  
                        <a class='boton' href='editar-edificio.php?seleccionado=".$id_edificio_recibido."'>
                          <button value='Editar' class='btn btn-primary' type='button'>Editar</button>
                        </a>
                      </td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>  
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
