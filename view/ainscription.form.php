<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/code.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="cuerpo">
    <div class="caja">
    <div class=alert id='mensaje'></div>
            <h2>Inscripción</h2>
        <form METHOD='POST' action='../processes/inscript.proc.php' onsubmit="return inscripcion()">
            <p>Email</p>
            <input type='email' name='email' id='email'>
            <p>DNI</p>
            <input type='text' name='dni' id='dni'>
            <input type='hidden' name='id' value=<?php if(isset($_GET['id'])){echo"{$_GET['id']}";}else{echo"{$_POST['id']}";}?>>
            <input type='hidden' name='already' value=already>
            <br></br> 
            <input type='submit' value='Completar inscripcion' class="btn btn-dark">
        </form>
</div>
</body>
</html>