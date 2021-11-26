<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="caja">
        <form METHOD='POST' action='../processes/inscript.proc.php' onsubmit="return inscripcion()">
            <p>Email</p>
            <input type='email' name='email'>
            <p>Nombre</p>
            <input type='text' name='nombre' >
            <p>Apellido</p>
            <input type='text' name='apellido'>
            <p>Teléfono</p>
            <input type='number' name='telef'>
            <p>DNI</p>
            <td><input type='text' name='dni'>
            <input type='hidden' name='id' value=<?php if(isset($_GET['id'])){echo"{$_GET['id']}";}else{echo"{$_POST['id']}";}?>>
            <input type='submit' value='Completar inscripcion' class="btn btn-success">
        </form>
</div>
</body>
</html>