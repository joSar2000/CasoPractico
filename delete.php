<?php
    if (isset($_GET['idEstudiante'])) {
        include ("dataBase.php");
        //instanciamos
        $estudiantes = new DataBase();
        $idEstudiante = intval ($_GET['idEstudiante']);
        //lamamos a la funcion read()
        $res = $estudiantes -> deleteEstudiantes($idEstudiante);
        if ($res) {
            header ('location:delete.php');
        } else {
            return "false";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <button><a href="estudiantes.php">Volver</a></button>
</body>
</html>