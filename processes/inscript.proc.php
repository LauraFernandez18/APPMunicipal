<?php
    include '../services/config.php';   
    include '../services/conexion.php';
    if(isset($_POST['already'])){
        echo "si";
    }else{
        $idEvent=$_POST['id'];
        $mail=$_POST['email'];
        echo $mail;
        echo $idEvent;
        //comprobación de si el email está registrado mediante PDO
        $sentencia=$pdo->prepare("SELECT COUNT(*) from tbl_usuarios where email_usuario= :u ");
        $sentencia->execute(array(":u" => $mail));
        if($sentencia->fetchColumn() > 0){
        echo"<script>window.location.replace('../view/inscription.principal.php?id=".$idEvent."')</script>";
        }
        else{


        
            }
         }
?>
