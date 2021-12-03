<?php
    include '../services/config.php';   
    include '../services/conexion.php';
    $idUser=$_POST['id'];
    $idEv=$_POST['idE'];
    echo $idEv;
    //borramos al usuario de el evento en cuestion
    $del = $pdo->prepare("DELETE FROM tbl_inscripciones WHERE id_usuario = ? and id_evento = ? ");
    $del->bindParam(1, $idUser);
    $del->bindParam(2, $idEv);
    $del->execute();
    //Volvemos a usuarios registrados con el id por GET para que no de error
    echo"<script>window.location.replace('../view/registered.admin.php?id=".$idEv."')</script>";