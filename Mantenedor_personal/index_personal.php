<?php
    require("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal BD</title>
    <link rel="stylesheet" href="../CSS/estilo_mantenedor.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://www.ucsc.cl/">
                <img src="../CSS/logoucsc.png" alt="" width="100" height="33" class="d-inline-block align-text-top">
                Aforo UCSC - Personal
            </a>
            <a align="center" href="../acceso.php" class="cerrarsesion boton">
                <button value="cerrarsesion" class="btn btn-primary" type="button">Cerrar sesión</button>
            </a>

        </div>
    </nav>


    <div class="container-fluid fondopersonal">

        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <form action="funcion_guardar_personal.php" method="POST" class="formulario_personal">
                    <h3 align="center" class="mb-5">Formulario de registro de personal</h3>
                    <div class="mb-3">
                        <label class="form-label texto_registro">Run</label>
                        <input type="text" class="form-control" name="input_run_personal" placeholder="123456789" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label texto_registro">Nombre</label>
                        <input type="text" class="form-control" name="input_nombre_personal" placeholder="Felipe Valentín Muñoz" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label texto_registro">Cargo</label>
                        <br>
                        <select name="input_cargo_personal" class="opc_cargo">
                            <option>Auxiliar aseo</option>
                            <option>Mantencion</option>
                            <option>Seguridad</option>
                            <option>Administrativo</option>
                            <option>Docente</option>
                            <option>Alumno</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2 pt-5 boton">
                        <button type="submit" value="Guardar" class="btn btn-primary" type="button">Guardar</button>
                        <a align="center" href="../index_manten.php">
                            <button value="atras" class="btn btn-primary atras" type="button">Atrás</button>
                        </a>
                    </div>

                </form>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="listado_personal">
                    <table class="table table-bordered border-primary texto_listado">
                        <h3 align="center" class="mb-5">Listado de personal</h3>
                        <thead>
                            <tr>
                                <th scope="col">Run</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Opciones</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            $consulta = "SELECT * FROM personal";
                            $resultado = mysqli_query($conexion, $consulta);
                        
                            while ($row=mysqli_fetch_assoc($resultado)) {
                                $run_personal_recibido = $row["run"];
                                $nombre_personal_recibido = $row["nombre"];
                                $cargo_personal_recibido = $row["cargo"];
                                echo "<tr>";
                                echo "<td>".$run_personal_recibido."</td>";
                                echo "<td>".$nombre_personal_recibido."</td>";
                                echo "<td>".$cargo_personal_recibido."</td>";
                                echo "<td>
                                        <a class='boton' href='funcion_eliminar_personal.php?seleccionado=".$run_personal_recibido."'>
                                            <button value='eliminar' class='btn btn-primary' type='button'>Eliminar</button>
                                        </a>  
                                        <a class='boton' href='editar_personal.php?seleccionado=".$run_personal_recibido."'>
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


        <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
