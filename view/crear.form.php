<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/code.js"></script>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Crear evento</title>
</head>
<body>
<form action="../processes/crear.proc.php" method="post" class="caja" enctype="multipart/form-data" onsubmit="return evento();">
        <h2>Crear evento</h2>
        <div class=alert id='mensaje'></div>
        <p>Nombre del evento</p>
        <input type="text" name="nom_evento" id="nom_evento">
        <br>
        <p>Descripción del evento</p>
        <textarea type="text" rows="5" cols="50" name="desc_evento" id="desc_evento"></textarea>
        <br>
        <p>Lugar del evento</p>
        <input type="text" name="lugar_evento" id="lugar_evento">
        <br>
        <p>Fecha evento</p>
        <input type="date" name="fecha_evento" id="fecha_evento">
        <br>
        <p>Hora del evento</p>
        <input type="time" name="hora_evento" id="hora_evento">
        <br>
        <p>Maximo de participantes</p>
        <input type="num" name="max_evento" id="hora_evento">
        <br>
        <!-- <p>Añadir imagen</p> -->
        <!-- <input type="text" name="title" id="">-->
        <!-- <input type="file" name="file" id=""> -->
        <input type="hidden" name="id_evento" value="<?php echo $_GET['id_evento'] ?>">
        <br>
        <input type="submit" value="Crear" class="btn btn-success">
</div>
</form>
</body>
</html>