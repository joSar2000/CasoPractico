<?php
    if (isset($_GET['idMateria'])){
		$idMateria=intval($_GET['idMateria']);
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
    <title>CRUD Componentes</title>
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
                            <h3>Actualizar <b>Componentes Académicos</b></h3></div>
                        
                        </div>
                    </div>
                </div>
            <br>
            <?php
                include ("dataBase.php");
                $materias = new DataBase();
                if(isset($_POST) && !empty($_POST)){
					$nombreMateria = $materias->sanatize($_POST['nombreMateria']);
					$horasClase = $materias->sanatize($_POST['horasClase']);
					$seccion = $materias->sanatize($_POST['seccion']);
					$detalles = $materias->sanatize($_POST['detalles']);
                    $fecha_actualizacion_c = 'CURRENT_TIMESTAMP';
					$idMateria=intval($_POST['idMateria']);
					$res = $materias->updateMaterias($idMateria, $nombreMateria, $seccion, $detalles, $fecha_actualizacion_c);
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
				$datos_materia=$materias->single_record_materias($idMateria);
            ?>
			<div class="row">
				<form method="post">
					<div class="form-row">

                    <div class="col-md-6">
                        <label>NOMBRE DE LA MATERIA:</label>
                        <input type="text" name="nombreMateria" id="nombreMateria" class='form-control' maxlength="100" required  value="<?php echo $datos_materia->nombreMateria;?>">
                        <input type="hidden" name="idMateria" id="idMateria" class='form-control' maxlength="100"   value="<?php echo $datos_materia->idMateria;?>">
                        </div>
                        <div class="col-md-6">
                            <label>HORAS DE CLASE</label>
                            <input type="number" name="horasClase" id="horasClase" class='form-control' maxlength="100" required value="<?php echo $datos_materia->horasClase;?>">
                        </div>
                        <div class="col-md-6">
                            <label>SECCION</label>
                            <input type="text" name="seccion" id="seccion" class='form-control' maxlength="15" required value="<?php echo $datos_materia->seccion;?>">
                        </div>
                        <div class="col-md-6">
                            <label>DETALLES</label>
                            <br>
                            <textarea name="detalles" id="detalles" cols="74" rows="10" required value="<?php echo $datos_materia->detalles;?>"></textarea>
                        
                        </div>
                        <div class="col-md-12 pull-right">
                        <hr>
                            <button type="submit" class="btn btn-success">Actualizar datos</button>
                            <button class="btn btn-success"><a href="estudiantes.php">Volver</a></button>
                        </div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>