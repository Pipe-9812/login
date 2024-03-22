<?php
    session_start();


    if(isset($_SESSION['admin'])) {
        $user_welcome = $_SESSION['admin'];
    } else {
        header('Location:sign_in/layout_sign_in.php');
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/global.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="height: 100%;">

    <div class="container">
        <div class="box-welcome">
            <h1 style="color: #fff; font-size: 3rem;">
                Welcome!
                <i style="text-decoration: underline;"><?php echo $user_welcome ?></i>
                <span style="display: inline-flex;" class="animate__animated animate__flipInY">😎</span>
            </h1>

            <a class="btn-close-session" href="sign_in/close_session.php">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>