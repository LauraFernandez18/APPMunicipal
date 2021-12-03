<?php
include '../services/config.php';
include '../services/conexion.php';

$nom_evento=$_POST['nom_evento'];
$desc_evento=$_POST['desc_evento'];
$lugar_evento=$_POST['lugar_evento'];
$fecha_evento=$_POST['fecha_evento'];
$hora_evento=$_POST['hora_evento'];
$max_evento=$_POST['max_evento'];
$foto_evento=$_FILES['foto_evento'];
$id_evento=$_POST['id_evento'];
$foto=$foto_evento['name'];

$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["foto_evento"]["name"]);
if (move_uploaded_file($_FILES["foto_evento"]["tmp_name"], $target_file)) {
    echo "El archivo ". basename( $_FILES["foto_evento"]["name"]). " Se subio correctamente";
} else {
    echo "Error al cargar el archivo";
}

    $modificar = $pdo->prepare("UPDATE tbl_eventos
    SET nom_evento = ?,desc_evento = ?,lugar_evento = ?,fecha_evento = ?,hora_evento = ?,max_evento = ?,foto_evento = ?
    where id_evento= ?");
   
    $modificar->bindParam(1, $nom_evento);
    $modificar->bindParam(2, $desc_evento);
    $modificar->bindParam(3, $lugar_evento);
    $modificar->bindParam(4, $fecha_evento);
    $modificar->bindParam(5, $hora_evento);
    $modificar->bindParam(6, $max_evento);
    $modificar->bindParam(7, $foto);
    $modificar->bindParam(8, $id_evento);
   
    $modificar->execute();

    header('Location: ../view/pag.admin.php');
    
