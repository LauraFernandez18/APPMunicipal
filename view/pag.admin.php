<?php
include '../services/config.php';
include '../services/conexion.php';
$sentencia=$pdo->prepare("SELECT * FROM tbl_eventos");
$sentencia->execute();
$eventos=$sentencia->fetchAll(PDO::FETCH_ASSOC);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Eventos disponibles</title>
</head>
<body>
<div class="row">
<div class="pag_principal">
<div class='iniciar_sesion'>
<a href='../processes/login.proc.php'>Iniciar sesión</a><br>
</div>
<h1>Eventos disponibles</h1>
<br></br>
<?php
    foreach ($eventos as $producto){
        ?>
        <div class="seccion">
        <h2><?php echo"{$producto['nom_evento']}";?></h2>
        <div class="column1">
        <img src="../img/ciclismo.jpg">
        </div>
        <div class="column2">
        <?php echo"{$producto['desc_evento']}";?>
        <p><?php echo"{$producto['lugar_evento']}";?><p>
        <p><?php echo"{$producto['fecha_evento']}";?><p>
        <p><?php echo"{$producto['hora_evento']}";?><p>
    </div>
        <form METHOD='POST' action='../processes/atualizar.proc.php'>
            <h2><input type='hidden' name='nom' value=<?php echo"{$producto['nom_evento']}";?>></h2>
            <input type='hidden' name='desc' value=<?php echo"{$producto['desc_evento']}";?>>
            <input type='hidden' name='lugar' value=<?php echo"{$producto['lugar_evento']}";?>>
            <input type='hidden' name='fecha' value=<?php echo"{$producto['fecha_evento']}";?>>
            <input type='hidden' name='hora' value=<?php echo"{$producto['hora_evento']}";?>>
            <input type='hidden' name='id' value=<?php echo"{$producto['id_evento']}";?>>
            <input type='submit' value='Actualizar' class="btn btn-success">
        </form>
        <form METHOD='POST' action='registered.admin.php'>
            <h2><input type='hidden' name='nom' value=<?php echo"{$producto['nom_evento']}";?>></h2>
            <input type='hidden' name='desc' value=<?php echo"{$producto['desc_evento']}";?>>
            <input type='hidden' name='lugar' value=<?php echo"{$producto['lugar_evento']}";?>>
            <input type='hidden' name='fecha' value=<?php echo"{$producto['fecha_evento']}";?>>
            <input type='hidden' name='hora' value=<?php echo"{$producto['hora_evento']}";?>>
            <input type='hidden' name='id' value=<?php echo"{$producto['id_evento']}";?>>
            <input type='submit' value='Registrados' class="btn btn-warning">
        </form>
        <form METHOD='POST' action='../processes/delete.proc.php'>
            <h2><input type='hidden' name='nom' value=<?php echo"{$producto['nom_evento']}";?>></h2>
            <input type='hidden' name='desc' value=<?php echo"{$producto['desc_evento']}";?>>
            <input type='hidden' name='lugar' value=<?php echo"{$producto['lugar_evento']}";?>>
            <input type='hidden' name='fecha' value=<?php echo"{$producto['fecha_evento']}";?>>
            <input type='hidden' name='hora' value=<?php echo"{$producto['hora_evento']}";?>>
            <input type='hidden' name='id' value=<?php echo"{$producto['id_evento']}";?>>
            <input type='submit' value='Borrar' class="btn btn-danger">
        </form>
        </div>
    <?php 
    }
     ?>
</div>
</div>
</body>
</html>