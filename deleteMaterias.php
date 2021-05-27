<?php
    if (isset($_GET['idMateria'])) {
        include ("dataBase.php");
        //instanciamos
        $materias = new DataBase();
        $idMateria = intval ($_GET['idMateria']);
        //lamamos a la funcion read()
        $res = $materias -> deleteMaterias($idMateria);
        if ($res) {
            header ('location:deleteMaterias.php');
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
    <button><a href="componentes.php">Volver</a></button>
</body>
</html>