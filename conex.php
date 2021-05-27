<?php
    $conex = mysqli_connect(
        'localhost',
        'root',
        '',
        'estudiantes'
    );

    if ($conex) {
        echo "Conexion exitosa";
    } else {
        echo "Falla en la conexión";
    }

?>