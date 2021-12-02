<?php
    include '../services/config.php';   
    include '../services/conexion.php';
    //si el usuario ya esta creado
    if(isset($_POST['already'])){
        $idEvent=$_POST['id'];
        $mail=$_POST['email'];
        $dni=$_POST['dni'];
        $sentencia=$pdo->prepare("SELECT COUNT(*) from tbl_usuarios where email_usuario= :u and  dni_usuario= :i");
        $sentencia->execute(array(":u" => $mail,":i" => $dni));
        if($sentencia->fetchColumn() < 0){
            echo "<script> alert('No se encuentra ninguna cuenta asociada')</script>";
            echo"<script>window.location.replace('../view/ainscription.form.php?id=".$idEvent."')</script>";
        }else{
            //comprobamos que el usuario no se ha registrado previamente creando un duplicado
            $sentencia = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE email_usuario like ?");
            $sentencia->bindParam(1, $mail);
            $sentencia->execute();
            $idUsu = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $finalid=$idUsu[0]['id_usuario'];
            //ejecutamos la query que compueba que el usuario no estaba previamente registrado
            $comp=$pdo->prepare("SELECT COUNT(*) from tbl_inscripciones where id_evento= :u and id_usuario= :i ");
            $comp->execute(array(":u" => $idEvent,":i" => $finalid));
            if($comp->fetchColumn() > 0){
                echo "<script> alert('Usted ya esta registrado a este evento')</script>";
                echo"<script>window.location.replace('../view/pag.principal.php')</script>";
            }
            //preparamos todas las queries para comprobar si hemos rebasado el maximo de integrantes en un evento
            $sentencia=$pdo->prepare("SELECT COUNT(*) from tbl_inscripciones where id_evento= :u");
            $sentencia->execute(array(":u" => $idEvent,));
            $integrantes=$pdo->prepare("SELECT * from tbl_eventos where id_evento= :u");
            $integrantes->execute(array(":u" => $idEvent,));
            $arrDatos = $integrantes->fetchAll(PDO::FETCH_ASSOC);
            //aqui filtramos si supera el maximo de personas registradas en el evento
            if($sentencia->fetchColumn() > $arrDatos[0]['max_evento']){
                echo "<script> alert('Lo siento ya se ha superado el maximo de personas registradas al evento')</script>";
                echo"<script>window.location.replace('../view/pag.principal.php')</script>";
            }else{
                $sentencia = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE email_usuario like ?");
                 $sentencia->bindParam(1, $mail);
                $sentencia->execute();
                $arrDatos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                 //Leer variable con los datos
                 //$arrDatos[0]['id_usuario'];
                //registramos al usuario en el evento
                $event = $pdo->prepare("INSERT INTO tbl_inscripciones (id_evento, id_usuario, fecha_inscripcion, hora_inscripcion) VALUES (?, ?, CURDATE(),CURTIME())");
                 // Bindeamos los parametros a los ?
                $event->bindParam(1, $idEvent);
                $event->bindParam(2, $arrDatos[0]['id_usuario']);
                // Excecute
                $event->execute();
                echo "<script> alert('Registro completado')</script>";
                echo"<script>window.location.replace('../view/pag.principal.php')</script>";
            }
        }
    }
    //si el usuario no esta creado
    else{
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
            //preparamos todas las queries para comprobar si hemos rebasado el maximo de integrantes en un evento
            $sentencia=$pdo->prepare("SELECT COUNT(*) from tbl_inscripciones where id_evento= :u");
            $sentencia->execute(array(":u" => $idEvent,));
            $integrantes=$pdo->prepare("SELECT * from tbl_eventos where id_evento= ?");
            $integrantes->bindParam(1, $idEvent);
            $integrantes->execute();
            $arrDatos = $integrantes->fetchAll(PDO::FETCH_ASSOC);
            //aqui filtramos si supera el maximo de personas registradas en el evento
            if($sentencia->fetchColumn() > $arrDatos[0]['max_evento']){
                echo "<script> alert('Lo siento ya se ha superado el maximo de personas registradas al evento')</script>";
                echo"<script>window.location.replace('../view/pag.principal.php')</script>";
            }else{
                //------------------------------------------------------------------------------------------------------------------/
                //preparamos la sentencia sql para poder introducir los datos de usuario y registrar nuestro nuevo usuarios    
                $stmt = $pdo->prepare("INSERT INTO tbl_usuarios (email_usuario, nom_usuario, apellido_usuario, telf_usuario, dni_usuario, id_perfil) VALUES (?, ?, ?, ?, ?, 2)");
                 // Bind
                 $stmt->bindParam(1, $mail);
                $stmt->bindParam(2, $_POST['nombre']);
                $stmt->bindParam(3, $_POST['apellido']);
                $stmt->bindParam(4, $_POST['telef']);
                $stmt->bindParam(5, $_POST['dni']);
                // Excecute
                $stmt->execute();
                //------------------------------------------------------------------------------------------------------------------//
                //recogemos el id del usuario previamente creado
                $sentencia = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE email_usuario like ?");
                $sentencia->bindParam(1, $mail);
                $sentencia->execute();
                $arrDatos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                 //Leer variable con los datos
                 //$arrDatos[0]['id_usuario'];
                //registramos al usuario en el evento
                $event = $pdo->prepare("INSERT INTO tbl_inscripciones (id_evento, id_usuario, fecha_inscripcion, hora_inscripcion) VALUES (?, ?, CURDATE(),CURTIME())");
                 // Bind
                 $event->bindParam(1, $idEvent);

                $event->bindParam(2, $arrDatos[0]['id_usuario']);
                // Excecute
                $event->execute();
                //nos envia a de nuevo a la pagina principal 
                echo "<script> alert('Registro completado')</script>";
                echo"<script>window.location.replace('../view/pag.principal.php')</script>";
                }
            }
        }
?>
