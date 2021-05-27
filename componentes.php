
<?php
//llamamos al database archivo
    include ("conex.php");
	include ("dataBase.php");
    //instanciamos
	$materias = new DataBase();
	$materias_listado = $materias -> readMaterias();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>COMPONENTES</title>
</head>
<body class="container">
    <header>
        <h1>INGRESE LA INFORMACIÓN PERTINENTE A LOS COMPONENTES ACADÉMICOS</h1>
    </header>
    <section>
    <div class="row">
				<form method="post" action = "insertarMaterias.php">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label class="font-weight-bold">NOMBRE DE LA MATERIA</label>
							<input type="text" name="nombreMateria" id="nombreMateria" class='form-control' maxlength="100" required >
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold">HORAS DE CLASE</label>
							<input  type="number" name="horasClase" id="horasClase" class='form-control' maxlength="100" required>
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold">SECCIÓN</label>
							<input type="text" name="seccion" id="seccion" class='form-control' maxlength="15" required >
						</div>
						<div class="form-group col-md-6">
							<label class="font-weight-bold">DETALLES</label>
							<input type="text" name="detalles" id="detalles" class='form-control' maxlength="64" required>
						</div>	
                        <div>
                            <select name="idEstudiante" id="idEstudiante">
                            <option value="">SELECCIONE EL ALUMNO</option>
                                <?php 
                                   $sql = $conex -> query("SELECT * FROM estudiantes");
                                   
                                    while ($row = $sql -> fetch_array()) {
                                        echo "<option value ='".$row['idEstudiante']."'>".$row['nombre']." ".$row['apellido']."</option>";
                                    }
                                ?></select>
                        </div>
                        <div>
                            <select name="idProfesor" id="idProfesor">
                            <option value="">SELECCIONE UN PROFESOR</option>
                                <?php 
                                   $sql = $conex -> query("SELECT * FROM profesor");
                                   
                                    while ($row = $sql -> fetch_array()) {
                                        echo "<option value ='".$row['idProfesor']."'>".$row['nombre_p']." ".$row['apellido_p']."</option>";
                                    }
                                ?></select>
                        </div>
						<div class="form-group col-md-12">
							<hr>
							<button type="submit" class="btn btn-success">Guardar</button>
						</div>
					</div>
				</form>
				<div class="container-fluid">
                <div class="table-wrapper">
                    
                        <div class="row">
                            <divm class="col-sm-8">
                                <h2>LISTADO DE COMPONENTES ACADÉMICOS</h2>
                            </div>
                            <div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NOMBRE MATERIA</th>
                                            <th>HORAS CLASE</th>
                                            <th>SECCION</th>
                                            <th>DETALLES</th>
                                            <th>FECHA REGISTRO</th>
                                            <th>FECHA ACTUALIZACION</th>
                                            <th>ESTUDIANTE</th>
                                            <th>DOCENTE</th>
                                            <th>ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            while ($row = mysqli_fetch_object($materias_listado)) {
												$idMateria = $row -> idMateria;
                                                $nombreMateria = $row -> nombreMateria;
                                                $horasClase = $row -> horasClase;
                                                $seccion = $row -> seccion;
                                                $detalles = $row -> detalles;
                                                $fecha_registro_c = $row -> fecha_registro_c;
                                                $fecha_actualizacion_c = $row -> fecha_actualizacion_c;
                                                $nombre = $row -> nombre;
                                                $apellido = $row -> apellido;
                                                $nombre_p = $row -> nombre_p;
                                                $apellido_p = $row -> apellido_p

                                        ?>
                                        <tr>
                                                <td><?php echo $nombreMateria ?></td>
                                                <td><?php echo $horasClase ?></td>
                                                <td><?php echo $seccion ?></td>
                                                <td><?php echo $detalles ?></td>
                                                <td><?php echo $fecha_registro_c ?></td>
                                                <td><?php echo $fecha_actualizacion_c ?></td>
												<td><?php echo $nombre." ".$apellido ?></td>
                                                <td><?php echo $nombre_p." ".$apellido_p ?></td>
                                                <td>
                                                    
                                                    <button><a target=_blanck href="updateMaterias.php?
													idMateria=<?php echo $idMateria ?>">ACTUALIZAR</a></button>
                                                    <button><a target=_blanck href="deleteMaterias.php?
													idMateria=<?php echo $idMateria ?>">ELIMINAR</a></button>
                                                    
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
			</div>
    </section>
</body>
</html>