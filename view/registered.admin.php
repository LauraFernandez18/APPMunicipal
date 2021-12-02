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
<body>
<div class="row">
<div class="pag_principal">
<h1>Eventos disponibles</h1>
<br></br>
<?php
    foreach ($eventos as $producto){
        ?>
        <p><?php echo"{$producto['nom_usuario']}";?><p>
        <p><?php echo"{$producto['apellido_usuario']}";?><p>
        <p><?php echo"{$producto['telf_usuario']}";?><p>
        <p><?php echo"{$producto['dni_usuario']}";?><p>
         <!--Esto de aqui abajo haz un echo para pasarlo al modificar no lo muestres que es el id, te lo coloco para que lo veas solo -->
        <p><?php echo"{$producto['id_usuario']}";?><p>
    <?php 
    }
     ?>
</div>
</div>
</body>
</html>