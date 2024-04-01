<?php
    include_once '../connection.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/global.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="height: 100%;">

    <div class="container">
        <div class="box-login">
            <form class="form-login" action="recovery_password.php" method="post">
                <div class="card-login">
                    <div class="header-login">
                        <h1>Recovery Password</h1>
                    </div>

                    <div class="body-login">
                        <div class="inp <?php echo (isset($_GET['user_login']) && $_GET['user_login'] !== '') ? 'input-filled' : (isset($_GET['user_login']) ? 'input-empty' : 'border-silver'); ?>">
                            <input placeholder="Email" type="text" name="user_email">
                            <span class="box-icon">
                                <i class="far fa-envelope"></i>
                            </span>
                        </div>

                        <button type="submit" class="btn-custom">Send</button>

                        <span class="link">                           
                            <a href="../sign_in/layout_sign_in.php">Back to Sign In</a>
                        </span>
                    </div>
                </div>
            </form>

            <div class="img-login">

            </div>
        </div>
    </div>

    <script src="../js/global.js"></script>
</body>
</html>