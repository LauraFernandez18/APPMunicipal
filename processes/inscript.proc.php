<?php
    include '../services/config.php';   
    include '../services/conexion.php';
    if(isset($_POST['already'])){
        echo "si";
    }else{
        $idEvent=$_POST['id'];
        $mail=$_POST['email'];
        echo $mail;
        //echo $idEvent;
        //comprobación de si el email está registrado mediante PDO
        $sentencia=$pdo->prepare("SELECT COUNT(*) from tbl_usuarios where email_usuario= :u ");
        $sentencia->execute(array(":u" => $mail));
        //condicional que indica si hay alguna coincidencia en la base de datos
            if($sentencia->fetchColumn() > 0){
            echo "<script> alert('Correo electronico ya en uso')</script>";
            echo"<script>window.location.replace('../view/inscription.principal.php?id=".$idEvent."')</script>";
            }
            else{
            /*------------------------------------------------------------------------------------------------------------------*/
            //preparamos la sentencia sql para poder introducir los datos de usuario y registrar nuestro nuevo usuario
            $stmt = $pdo->prepare("INSERT INTO tbl_usuarios (email_usuario, nom_usuario, apellido_usuario, telf_usuario, dni_usuario, id_perfil) VALUES (?, ?, ?, ?, ?, 2)");
             // Bind
            $stmt->bindParam(1, $mail);
            $stmt->bindParam(2, $_POST['nombre']);
            $stmt->bindParam(3, $_POST['apellido']);
            $stmt->bindParam(4, $_POST['telef']);
            $stmt->bindParam(5, $_POST['dni']);
            // Excecute
            $stmt->execute();
            $test='Paco11111@gmail.com';
            /*------------------------------------------------------------------------------------------------------------------*/
            //recogemos el id del usuario previamente creado
            $sentencia = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE email_usuario like ?");
            $sentencia->bindParam(1, $mail);
            $sentencia->execute();
            $arrDatos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
             //Leer variable con los datos
            foreach ($arrDatos as $value) {
            //registramos al usuario en el evento
            $event = $pdo->prepare("INSERT INTO tbl_inscripciones (id_evento, id_usuario, fecha_inscripcion, hora_inscripcion) VALUES (?, ?, CURDATE(),CURTIME())");
             // Bind
            $event->bindParam(1, $idEvent);
            $event->bindParam(2, $value['id_usuario']);
            // Excecute
            $event->execute();
            }  
            echo "<script> alert('Registro completado')</script>";
            echo"<script>window.location.replace('../view/pag.principal.php')</script>";
            }
        }
?>
