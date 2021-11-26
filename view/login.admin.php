<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/code.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="login">
        <h1>Login</h1><br>
        <div class=alert id='mensaje'></div>
        <form action='../processes/login.proc.php' method='POST' onsubmit="return validar();">
        <input type='email' name='email_usuario' id='email_usuario' placeholder="Email"/><br><br>
        <input type='pass_usuario' name='pass_usuario' id='pass_usuario' placeholder="Contraseña"/><br><br>
        <INPUT TYPE='SUBMIT' NAME='crear' VALUE='Iniciar sesión' class="btn btn-dark btn_login">
</input>
        </form>
</div>

</body>
</html>



