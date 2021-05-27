<?php
//llamamos al database archivo
    include ("dataBase.php");
    //instanciamos
    $profesores = new DataBase();
    //lamamos a la funcion read()
    $profesores_Listado = $profesores -> readProfesores();
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
        <h1>FORMULARIO DE INGRESO DE PROFESORES</h1>
    </header>
    <section>

    <?php       
            
            $profesores = new DataBase ();
            if (isset($_POST) && !empty($_POST)) {
                $nombre_p = $profesores -> sanatize($_POST['nombre_p']);
                $apellido_p = $profesores -> sanatize($_POST['apellido_p']);
                $cedula = $profesores -> sanatize($_POST['cedula']);
                $email_p = $profesores -> sanatize($_POST['email_p']);
                $fecha_registro_p = "CURRENT_TIMESTAMP";
                $res = $profesores -> createProfesores($nombre_p, $apellido_p, $cedula, $email_p, $fecha_registro_p);
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
							<input type="text" name="nombre_p" id="nombre_p" class='form-control' maxlength="100" required >
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold">Apellidos:</label>
							<input type="text" name="apellido_p" id="apellido_p" class='form-control' maxlength="100" required>
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold">Cédula:</label>
							<input type="text" name="cedula" id="cedula" class='form-control' maxlength="15" required >
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold">Correo electrónico:</label>
							<input type="email" name="email_p" id="email_p" class='form-control' maxlength="64" required>
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
                                <h2>LISTADO DE PROFESORES</h2>
                            </div>
                            <div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRES</th>
                                            <th>APELLIDOS</th>
                                            <th>CÉDULA</th>
                                            <th>EMAIL</th>
                                            <th>FECHA REGISTRO</th>
                                            <th>FECHA ACTUALIZACION</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while ($row = mysqli_fetch_object($profesores_Listado)) {
                                                $idProfesor = $row -> idProfesor;
                                                $nombre_p = $row -> nombre_p;
                                                $apellido_p = $row -> apellido_p;
                                                $cedula = $row -> cedula;
                                                $email_p = $row -> email_p; 
                                                $fecha_registro_p = $row -> fecha_registro_p;
                                                $fecha_actualizar_p = $row -> fecha_actualizar_p;
                                        ?>
                                        <tr>
                                                <td><?php echo $idProfesor ?></td>
                                                <td><?php echo $nombre_p ?></td>
                                                <td><?php echo $apellido_p ?></td>
                                                <td><?php echo $cedula ?></td>
                                                <td><?php echo $email_p ?></td>
                                                <td><?php echo $fecha_registro_p ?></td>
                                                <td><?php echo $fecha_actualizar_p ?></td>
                                                <td>
                                                    
                                                    <button><a target=_blanck href="updateProfesor.php?idProfesor=<?php echo $idProfesor; ?>">ACTUALIZAR</a></button>
                                                    <button><a target=_blanck href="deleteProfesor.php?idProfesor=<?php echo $idProfesor; ?>">ELIMINAR</a></button>
                                                    
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