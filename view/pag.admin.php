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
        echo "<td><a type='button' class='btn btn-danger' href='../processes/delete.proc.php'>Delete</a></td>";
        ?>
    </tr>
        <!-- <form METHOD='POST' action='inscription.principal.php'>
            <h2><input type='hidden' name='nom' value=<?php echo"{$producto['nom_evento']}";?>></h2>
            <input type='hidden' name='desc' value=<?php echo"{$producto['desc_evento']}";?>>
            <input type='hidden' name='lugar' value=<?php echo"{$producto['lugar_evento']}";?>>
            <input type='hidden' name='fecha' value=<?php echo"{$producto['fecha_evento']}";?>>
            <input type='hidden' name='hora' value=<?php echo"{$producto['hora_evento']}";?>>
            <input type='hidden' name='id' value=<?php echo"{$producto['id_evento']}";?>>
            <input type='submit' value='Inscribete' class="btn btn-success">
        </form> -->
    <?php 
    }
     ?>
     </table>
</div>
</div>
</body>
</html>