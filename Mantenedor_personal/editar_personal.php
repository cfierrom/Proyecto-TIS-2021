<?php
    require("conexion.php");
    $run_personal_recibido=$_GET["seleccionado"];
    $consulta = "SELECT * FROM personal WHERE run=$run_personal_recibido";
    $resultado = mysqli_query($conexion,$consulta);
    
    while($row=mysqli_fetch_assoc($resultado)){
        $run_personal_recibido = $row["run"];
        $nombre_personal_recibido = $row["nombre"];
        $cargo_personal_recibido = $row["cargo"];
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal editar</title>

    <link rel="stylesheet" href="../CSS/estilo_mantenedor.css">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index_personal.php">
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
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form action="funcion_editar_personal.php" method="POST" class="edicion_personal">
                    <h3 align="center" class="mb-5">Formulario de Edición de personal</h3>
                    <input type="hidden" name="input_run_oculto" value="<?php echo "$run_personal_recibido" ?>">                    
                    
                    <div class="mb-3">
                        <label class="form-label texto_registro">Nombre</label>
                        <input type="text" class="form-control" name="input_nombre_personal" value="<?php echo "$nombre_personal_recibido" ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label texto_registro">Cargo</label>
                        <br>
                        <select name="input_cargo_personal" class="opc_cargo">
                            <option selected><?php echo "$cargo_personal_recibido"?></option>
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
                        <a align="center" href="index_personal.php">
                            <button value="atras" class="btn btn-primary atras" type="button">Atrás</button>
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
