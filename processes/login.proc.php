<?php 
require_once("conexion.php");
if (isset($_POST['nom_user']) && isset($_POST['password_user'])) {
    require_once '../services/conexion.php';
    $email_usuario=$_POST['email_usuario'];
    $pass_usuario=$_POST['pass_usuario'];
    $stmt = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE email_usuario=? and pass_usuario=?");
    $stmt->bindParam(1, $_POST['email_usuario']);
    $stmt->bindParam(2, $_POST['pass_usuario']);
    $stmt->execute();
    $comprobar=$stmt->fetchAll(PDO::FETCH_ASSOC);
    try {
        if (!$comprobar=="") {
            session_start();
            $_SESSION['email_usuario']=$email_usuario;

            header("location: ../view/pag.admin.php");
        }else {
            session_start();
            $_SESSION['error']=1;
            header("location: ../view/login.admin.php");
            
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    header("location: ../view/login.admin.php");
}