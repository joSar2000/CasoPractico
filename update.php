<?php
    if (isset($_GET['idEstudiante'])){
		$idEstudiante=intval($_GET['idEstudiante']);
	} else {
		echo "Falla";
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title>CRUD Clientes</title>
</head>
<body>
	<div class="container">
    	<br><br>
        <h1 class="text-secondary text-center">Actualizar datos</h1>
        <br><br>
        <div class="table-wrapper">
            <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Actualizar <b>Cliente</b></h3></div>
                        
                        </div>
                    </div>
                </div>
            <br>
            <?php
                include ("dataBase.php");
                $estudiantes = new DataBase();
                if(isset($_POST) && !empty($_POST)){
					$nombre = $estudiantes->sanatize($_POST['nombre']);
					$apellido = $estudiantes->sanatize($_POST['apellido']);
					$telefono = $estudiantes->sanatize($_POST['telefono']);
					$email = $estudiantes->sanatize($_POST['email']);
                    $fecha_actualizacion_e = 'CURRENT_TIMESTAMP';
					$idEstudiante=intval($_POST['idEstudiante']);
					$res = $estudiantes->updateEstudiantes($idEstudiante, $nombre, $apellido, $telefono, $email, $fecha_actualizacion_e);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				    <?php echo $message;?>
				</div>	
				    <?php
				}
				$datos_estudiante=$estudiantes->single_record($idEstudiante);
            ?>
			<div class="row">
				<form method="post">
					<div class="form-row">

					    <div class="col-md-6">
                        <label>Nombres:</label>
                        <input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required  value="<?php echo $datos_estudiante->nombre;?>">
                        <input type="hidden" name="idEstudiante" id="idEstudiante" class='form-control' maxlength="100"   value="<?php echo $datos_estudiante->idEstudiante;?>">
                        </div>
                        <div class="col-md-6">
                            <label>Apellidos:</label>
                            <input type="text" name="apellido" id="apellido" class='form-control' maxlength="100" required value="<?php echo $datos_estudiante->apellido;?>">
                        </div>
                        <div class="col-md-6">
                            <label>Teléfono:</label>
                            <input type="text" name="telefono" id="telefono" class='form-control' maxlength="15" required value="<?php echo $datos_estudiante->telefono;?>">
                        </div>
                        <div class="col-md-6">
                            <label>Correo electrónico:</label>
                            <input type="email" name="email" id="email" class='form-control' maxlength="64" required value="<?php echo $datos_estudiante->email;?>">
                        
                        </div>
                        
                        <div class="col-md-12 pull-right">
                        <hr>
                            <button type="submit" class="btn btn-success">Actualizar datos</button>
                            <button class="btn btn-success"><a href="estudiantes.php">Volver</a></button>
                        </div>
                    </div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>