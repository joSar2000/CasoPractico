<?php
    if (isset($_GET['idProfesor'])) {
        include ("dataBase.php");
        //instanciamos
        $profesores = new DataBase();
        $idProfesor = intval ($_GET['idProfesor']);
        //lamamos a la funcion read()
        $res = $profesores -> deleteProfesores($idProfesor);
        if ($res) {
            header ('location:deleteProfesor.php');
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
    <button><a href="profesor.php">Volver</a></button>
</body>
</html>