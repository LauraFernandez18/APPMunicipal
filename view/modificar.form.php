<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Crear evento</title>
</head>
<body>
<form action="../processes/modificar.proc.php" method="post" class="caja" enctype="multipart/form-data">
        <h2>Modificar evento</h2>
        <p>Nombre del evento</p>
        <input type="text" name="nom_evento" value="<?php echo $_GET['nom_evento'] ?>">
        <br>
        <p>Descripción del evento</p>
        <input type="text" name="desc_evento" value="<?php echo $_GET['desc_evento'] ?>">
        <br>
        <p>Lugar del evento</p>
        <input type="text" name="lugar_evento" value="<?php echo $_GET['lugar_evento'] ?>">
        <br>
        <p>Fecha evento</p>
        <input type="date" name="fecha_evento" value="<?php echo $_GET['fecha_evento'] ?>">
        <br>
        <p>Hora del evento</p>
        <input type="time" name="hora_evento" value="<?php echo $_GET['hora_evento'] ?>" >
        <br>
        <p>Añadir imagen</p>
        <input type="text" name="title" value="<?php echo $_GET['title'] ?>">
        <input type="file" name="file" value="<?php echo $_GET['file'] ?>">
        <input type="hidden" name="id_evento" value="<?php echo $_GET['id_evento'] ?>">
        <br>
        <input type="submit" value="Crear" class="btn btn-success">
</div>
</form>
</body>
</html>