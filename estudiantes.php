<?php
//llamamos al database archivo
    include ("dataBase.php");
    //instanciamos
    $estudiantes = new DataBase();
    //lamamos a la funcion read()
    $estudiantes_Listado = $estudiantes -> readEstudiantes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>ESTUDIANTES</title>
</head>
<body class="container">
    <header>
        <h1>FORMULARIO DE INGRESO DE ESTUDIANTES</h1>
    </header>
    <section>

    <?php       
            
            $estudiantes = new DataBase ();
            if (isset($_POST) && !empty($_POST)) {
                $nombre = $estudiantes -> sanatize($_POST['nombre']);
                $apellido = $estudiantes -> sanatize($_POST['apellido']);
                $telefono = $estudiantes -> sanatize($_POST['telefono']);
                $email = $estudiantes -> sanatize($_POST['email']);
                $fecha_registro_e = 'CURRENT_TIMESTAMP';
                $res = $estudiantes -> createEstudiantes($nombre, $apellido, $telefono, $email, $fecha_registro_e);
                if ($res) {
                    $msj = "insertado con exito";
                    $class = "alert alert-success";
                } else {
                    $msj = "no pudo ser insertado";
                    $class = "alert alert danger";
                }
        ?>
        <div class="<?php echo $class ?>">
            <?php echo $msj; ?>
        </div>
        <?php } ?>
        <h2>POR FAVOR, INGRESE LOS DATOS CORRESPONDIENTES EN LAS SIGUENTES CAJAS DE TEXTO</h2>
        <div class="row">
				<form method="post">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label class="font-weight-bold">Nombres:</label>
							<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required >
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold">Apellidos:</label>
							<input type="text" name="apellido" id="apellido" class='form-control' maxlength="100" required>
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold">Teléfono:</label>
							<input type="text" name="telefono" id="telefono" class='form-control' maxlength="15" required >
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold">Correo electrónico:</label>
							<input type="email" name="email" id="email" class='form-control' maxlength="64" required>
						</div>					
						<div class="form-group col-md-12">
							<hr>
							<button type="submit" class="btn btn-success">Guardar</button>
                            
						</div>
					</div>
				</form>
			</div>
            <div class="container-fluid">
                <div class="table-wrapper">
                    
                        <div class="row">
                            <divm class="col-sm-8">
                                <h2>LISTADO DE ESTUDIANTES</h2>
                            </div>
                            <div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRES</th>
                                            <th>APELLIDOS</th>
                                            <th>TELEFONO</th>
                                            <th>EMAIL</th>
                                            <th>FECHA REGISTRO</th>
                                            <th>FECHA ACTUALIZACION</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while ($row = mysqli_fetch_object($estudiantes_Listado)) {
                                                $idEstudiante = $row -> idEstudiante;
                                                $nombre = $row -> nombre;
                                                $apellido = $row -> apellido;
                                                $telefono = $row -> telefono;
                                                $email = $row -> email;
                                                $fecha_registro_e = $row -> fecha_registro_e;
                                                $fecha_actualizacion_e = $row -> fecha_actualizacion_e; 
                                        ?>
                                        <tr>
                                                <td><?php echo $idEstudiante ?></td>
                                                <td><?php echo $nombre ?></td>
                                                <td><?php echo $apellido ?></td>
                                                <td><?php echo $telefono ?></td>
                                                <td><?php echo $email ?></td>
                                                <td><?php echo $fecha_registro_e ?></td>
                                                <td><?php echo $fecha_actualizacion_e ?></td>
                                                <td>
                                                    
                                                    <button><a target=_blanck href="update.php?idEstudiante=<?php echo $idEstudiante; ?>">ACTUALIZAR</a></button>
                                                    <button><a target=_blanck href="delete.php?idEstudiante=<?php echo $idEstudiante; ?>">ELIMINAR</a></button>
                                                    
                                                </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                </div>
    </div>
    </section>
</body>
</html>