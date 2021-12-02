<?php
    include '../services/config.php';   
    include '../services/conexion.php';
    $idUser=$_POST['id'];
    $idEv=$_POST['idE'];
    echo $idEv;
    $del = $pdo->prepare("DELETE FROM tbl_inscripciones WHERE id_usuario = ? and id_evento = ? ");
    $del->bindParam(1, $idUser);
    $del->bindParam(2, $idEv);
    $del->execute();
    echo"<script>window.location.replace('../view/registered.admin.php?id=".$idEv."')</script>";