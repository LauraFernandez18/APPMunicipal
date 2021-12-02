<?php
include '../services/config.php';
include '../services/conexion.php';

$nom_evento=$_POST['nom_evento'];
$desc_evento=$_POST['desc_evento'];
$lugar_evento=$_POST['lugar_evento'];
$fecha_evento=$_POST['fecha_evento'];
$hora_evento=$_POST['hora_evento'];
$max_evento=$_POST['max_evento'];

$crear = $pdo->prepare("INSERT INTO tbl_eventos (nom_evento,desc_evento,lugar_evento,fecha_evento,hora_evento,max_evento)
VALUES ( ?, ?, ?, ?, ?, ?)");
$crear->bindParam(1, $nom_evento);
$crear->bindParam(2, $desc_evento);
$crear->bindParam(3, $lugar_evento);
$crear->bindParam(4, $fecha_evento);   
$crear->bindParam(5, $hora_evento);  
$crear->bindParam(6, $max_evento);   
$crear->execute();
echo "<script> alert('Evento creado con exito !')</script>";
echo"<script>window.location.replace('../view/pag.admin.php')</script>";

?>