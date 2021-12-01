<?php
    include '../services/config.php';   
    include '../services/conexion.php';
    $idEvent=$_POST['id'];
    //deleteamos las inscripciones con el id evento X
    $sentencia = $pdo->prepare("DELETE FROM tbl_inscripciones WHERE (`id_evento` = ?");
    $sentencia->bindParam(1, $idEvent);
    $sentencia->execute();

//comprobamos el borrado de datos
    $sentencia=$pdo->prepare("SELECT COUNT(*) from tbl_inscripciones where id_evento= :u");
        $sentencia->execute(array(":u" => $idEventt));
        if($sentencia->fetchColumn() < 0){
            //si no se an borrado los datos de incripción nos enviaria de nuevo a la pagina principal de admin
            echo "<script> alert('Error no se ha podido borrar el evento, vuelva a intentarlo')</script>";
            echo"<script>window.location.replace('../view/pag.admin.php')</script>";
        }else{
            //Buscamos el evento en cuestión y lo deleteamos
            $del = $pdo->prepare("DELETE FROM tbl_eventos WHERE (`id_evento` = ?");
            $del->bindParam(1, $idEvent);
            $del->execute();

            echo "<script> alert('El evento ha sido borrado con exito')</script>";
            echo"<script>window.location.replace('../view/pag.admin.php')</script>";
        }
    ?>