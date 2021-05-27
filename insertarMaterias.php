<?php
    include ("conex.php");

    $sql = "INSERT INTO componentesacademicos (nombreMateria, horasClase, seccion, detalles, fecha_registro_c, idEstudiante, idProfesor) VALUES
    ('".$_POST['nombreMateria']."','".$_POST['horasClase']."','".$_POST['seccion']."','".$_POST['detalles']."'
    , '".$_GET['CURRENT_TIMESTAMP']."', '".$_POST['idEstudiante']."', '".$_POST['idProfesor']."')";
    echo $sql;

    $cadenaSQL = $conex -> query($sql);

    if (!$cadenaSQL) {
        echo "Mala ejecución";
    } else {
        echo "Correcto";
        header ('location:componentes.php');
    }
?>