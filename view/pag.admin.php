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
<table class="table table">
    <tr>
    <th>Evento</th>
    <th>Descripción</th>
    <th>Lugar</th>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Gestion</th>
    </th>
<?php
    foreach ($eventos as $producto){
        ?>
        <tr>
        <td><?php echo"{$producto['nom_evento']}";?></td>
        <td><?php echo"{$producto['desc_evento']}";?></td>
        <td><?php echo"{$producto['lugar_evento']}";?></td>
        <td><?php echo"{$producto['fecha_evento']}";?></td>
        <td><?php echo"{$producto['hora_evento']}";?></td>
        <form METHOD='POST' action='modificar.php'>
        <input type='hidden' name='nom' value=<?php echo"{$producto['nom_evento']}";?>>
        <input type='hidden' name='desc' value=<?php echo"{$producto['desc_evento']}";?>>
        <input type='hidden' name='lugar' value=<?php echo"{$producto['lugar_evento']}";?>>
        <input type='hidden' name='fecha' value=<?php echo"{$producto['fecha_evento']}";?>>
        <input type='hidden' name='hora' value=<?php echo"{$producto['hora_evento']}";?>>
            <input type='hidden' name='modificar' value=<?php echo"{$producto['id_evento']}";?>>
            <td><input type='submit' value='Gestionar' class="btn btn-success"></td>
        </form>
        </tr>
    <?php 
    }
     ?>
    </table>

</body>
</html>