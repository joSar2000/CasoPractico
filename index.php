<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Exámen Bimestral</title>
</head>
<body class="container" >
    <header>
        <h2 id="cabecera">FORMULARIO PARA EL INGRESO DE ESTUDIANTES Y COMPONENTES ACADÉMICOS</h2>
    </header>
    <section>
        <p>Por favor, elija mediante los siguientes botones el formulario de ingreso al que desea entrar:</p>
        <div class= "row">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">     
            <div class="col-4">
                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck1"><a href="estudiantes.php" target="_blank">ESTUDIANTES</a></label>
            </div>
            <div class="col-sm-4">
                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck2"><a href="componentes.php" target="_blank">COMPONENTES ACADÉMICOS</a></label>
            </div>
            <div class="col-sm-4">
                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck2"><a href="profesor.php" target="_blank">PROFESORES</a></label>
            </div>
        </div>
        </div>
    </section>
</body>
</html>