<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/code.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="cuerpo">
    <div class="caja">
            <h2>Inscripción</h2>
            <div class=alert id='mensaje'></div>
        <form METHOD='POST' action='../processes/inscript.proc.php' onsubmit="return inscripcion()">
            <p>Email</p>
            <input type='email' name='email' id='email'>
            <p>Nombre</p>
            <input type='text' name='nombre' id='nombre'>
            <p>Apellido</p>
            <input type='text' name='apellido' id='apellido'>
            <p>Teléfono</p>
            <input type='number' name='telef' id='telef'>
            <p>DNI</p>
            <input type='text' name='dni' id='dni'>
            <input type='hidden' name='id' value=<?php if(isset($_GET['id'])){echo"{$_GET['id']}";}else{echo"{$_POST['id']}";}?>>
            <br></br> 
            <input type='submit' value='Completar inscripcion' class="btn btn-dark">
        </form>
        <form METHOD='POST' action='ainscription.form.php'>
        <input type='hidden' name='id' value=<?php if(isset($_GET['id'])){echo"{$_GET['id']}";}else{echo"{$_POST['id']}";}?>>
        <br>
        <input type='submit' value='Ya estoy registrado' class="btn btn-dark">
        </form>
</div>
</body>
</html>