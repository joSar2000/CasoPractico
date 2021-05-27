<?php
    if (isset($_GET['idProfesor'])){
		$idProfesor=intval($_GET['idProfesor']);
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
                            <h3>Actualizar <b>Profesores</b></h3></div>
                        
                        </div>
                    </div>
                </div>
            <br>
            <?php
                include ("dataBase.php");
                $profesores = new DataBase();
                if(isset($_POST) && !empty($_POST)){
					$nombre_p = $profesores -> sanatize($_POST['nombre_p']);
                    $apellido_p = $profesores -> sanatize($_POST['apellido_p']);
                    //$cedula_p = $profesores -> sanatize($_POST['cedula_p']);
                    $email_p = $profesores -> sanatize($_POST['email_p']);
                    $fecha_actualizar_p = "CURRENT_TIMESTAMP";
					$idProfesor=intval($_POST['idProfesor']);
					$res = $profesores->updateProfesores($idProfesor,$nombre_p, $apellido_p, $email_p, $fecha_actualizar_p);
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
				$datos_profesores=$profesores->single_record_profesor($idProfesor);
            ?>
			<div class="row">
				<form method="post">
					<div class="form-row">

					    <div class="col-md-6">
                        <label>Nombres:</label>
                        <input type="text" name="nombre_p" id="nombre_p" class='form-control' maxlength="100" required  value="<?php echo $datos_profesores->nombre_p;?>">
                        <input type="hidden" name="idProfesor" id="idProfesor" class='form-control' maxlength="100"   value="<?php echo $datos_profesores->idProfesor;?>">
                        </div>
                        <div class="col-md-6">
                            <label>Apellidos:</label>
                            <input type="text" name="apellido_p" id="apellido_p" class='form-control' maxlength="100" required value="<?php echo $datos_profesores->apellido_p;?>">
                        </div>
                        <div class="col-md-6">
                            <label>Correo electrónico:</label>
                            <input type="email" name="email_p" id="email_p" class='form-control' maxlength="64" required value="<?php echo $datos_profesores->email_p;?>">
                        
                        </div>
                        
                        <div class="col-md-12 pull-right">
                        <hr>
                            <button type="submit" class="btn btn-success">Actualizar datos</button>
                            <button class="btn btn-success"><a href="profesor.php">Volver</a></button>
                        </div>
                    </div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>