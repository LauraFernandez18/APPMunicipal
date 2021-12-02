<?php
include '../services/config.php';
include '../services/conexion.php';
$idEvent=$_POST['id'];
$sentencia=$pdo->prepare("SELECT * FROM tbl_usuarios
inner join tbl_inscripciones
on tbl_usuarios.id_usuario=tbl_inscripciones.id_usuario
where tbl_inscripciones.id_evento=?");
$sentencia->bindParam(1, $idEvent);
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
<h1>Usuarios inscritos</h1>
<br></br>

    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>DNI</th>
            <th>Eliminar</th>
        </tr>
<?php
    foreach ($eventos as $producto){
        ?>
        <tr>
        <td><?php echo"{$producto['nom_usuario']}";?></td>
        <td><?php echo"{$producto['apellido_usuario']}";?></td>
        <td><?php echo"{$producto['telf_usuario']}";?></td>
        <td><?php echo"{$producto['dni_usuario']}";?></td>
        <td><form METHOD='POST' action='../processes/delete.user.proc.php'>
            <input type='hidden' name='id' value=<?php echo"{$producto['id_usuario']}";?>>
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