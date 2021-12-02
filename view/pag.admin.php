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
<body class="cuerpo">
<div class="pag_admin">
<a href='../processes/logout.proc.php' class='logout'>Logout</a>
<h1>Administración de eventos</h1>
<td><a type='button' class='btn btn-primary'  href="crear.form.php">Crear</a></td>
<br></br>
                <table class="table">
                <tr>
                    <th>Nombre evento</th>
                    <th>Descripción evento</th>
                    <th>Lugar evento</th>
                    <th>Fecha evento</th>
                    <th>Hora evento</th>
                    <th>Imagen</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
<?php
    foreach ($eventos as $producto){
        ?>
        <tr>
        <td><?php echo"{$producto['nom_evento']}";?></td>
        <td><?php echo"{$producto['desc_evento']}";?></td>
        <td><?php echo"{$producto['lugar_evento']}";?></td>
        <td><?php echo"{$producto['fecha_evento']}";?></td>
        <td><?php echo"{$producto['hora_evento']}";?></td>
        <td><img src="../img/ciclismo.jpg"></td>
        <?php
        echo "<td><a type='button' class='btn btn-success'  href='modificar.form.php?id={$producto['id_evento']}&nom_evento={$producto['nom_evento']}&desc_evento={$producto['desc_evento']}&lugar_evento={$producto['lugar_evento']}&fecha_evento={$producto['fecha_evento']}&hora_evento={$producto['hora_evento']}'>Modificar</a></td>";
        ?>
        <td><form METHOD='POST' action='../processes/delete.proc.php'>
            <input type='hidden' name='id' value=<?php echo"{$producto['id_evento']}";?>>
            <input type='submit' value='Borrar' class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este evento?')">
        </form></td>
    </tr>
    <?php 
    }
     ?>
     </table>
</div>
</body>
</html>