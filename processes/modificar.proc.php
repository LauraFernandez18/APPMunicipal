<?php
include '../services/config.php';
include '../services/conexion.php';

$nom_evento=$_POST['nom_evento'];
$desc_evento=$_POST['desc_evento'];
$lugar_evento=$_POST['lugar_evento'];
$fecha_evento=$_POST['fecha_evento'];
$hora_evento=$_POST['hora_evento'];
$id_evento=$_POST['id_evento'];

try {

    $modificar = $pdo->prepare("UPDATE tbl_eventos
    SET nom_evento = ?,desc_evento = ?,lugar_evento = ?,fecha_evento = ?,hora_evento = ?
    where id_evento= ?");
   
    $modificar->bindParam(1, $nom_evento);
    $modificar->bindParam(2, $desc_evento);
    $modificar->bindParam(3, $lugar_evento);
    $modificar->bindParam(4, $fecha_evento);
    $modificar->bindParam(5, $hora_evento);
    $modificar->bindParam(6, $id_evento);
   
    $modificar->execute();

    header('Location: ../view/pag.admin.php');
    
}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}