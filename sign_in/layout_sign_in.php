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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="height: 100%;">

    <div class="container">
        <div class="box-login">
            <form id="formLogin" class="form-login" action="sign_in.php" method="post">
                <div class="card-login">
                    <div class="header-login">
                        <!-- <span style="font-size: 2.3rem;">🏠</span> -->
                        <h1>Welcome Back</h1>
                        <!-- <small>Please enter your details.</small> -->
                        <small>Sign in to your account.</small>
                    </div>

                    <div class="body-login">

                        <?php if (isset($_GET["alert"]) && $_GET["alert"] == 1) : ?>
                            <div class="alert-sign-in">
                                The username or password is incorrect.
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_GET["alert"]) && $_GET["alert"] == 2) : ?>
                            <div class="alert-sign-in">
                                Please complete the <b>Username</b> and <b>Password</b> fields.
                            </div>
                        <?php endif; ?>

                        <div class="inp <?php echo (isset($_GET['user_login']) && $_GET['user_login'] !== '') ? 'input-filled' : (isset($_GET['user_login']) ? 'input-empty' : 'border-silver'); ?>">
                            <input placeholder="Username" type="text" name="user_login" value="<?php echo isset($_GET['user_login']) ? htmlspecialchars($_GET['user_login']) : ''; ?>">
                            <span class="box-icon">
                                <i class="far fa-user"></i>
                            </span>
                        </div>

                        <div class="inp <?php echo (isset($_GET['password_login']) && $_GET['password_login'] !== '') ? 'input-filled' : (isset($_GET['password_login']) ? 'input-empty' : 'border-silver'); ?>">
                            <input class="password" placeholder="Password" type="password" autocomplete="off" name="password_login" value="<?php echo isset($_GET['password_login']) ? htmlspecialchars($_GET['password_login']) : ''; ?>">

                            <span class="box-icon password">
                                <i class="far fa-eye icon-toggle" onclick="changeType(this)"></i>
                            </span>
                        </div>

                        <div class="remember">
                            <div>
                                <input id="remember" type="checkbox" class="checkbox-custom">
    
                                <label for="remember" class="lbl-custom">Remember for 30 days</label>
                            </div>

                            <a href="" id="link">Forgot password?</a>
                        </div>

                        <button type="submit" class="btn-custom">Sign In</button>

                        <span class="link">
                            Don't have an Account? &nbsp;                            
                            <a href="../sign_up/layout_sign_up.php">Sign Up</a>
                        </span>
                    </div>

                    <div class="footer-login">
                        <div class="line-divider"></div>

                        <div class="box-social">
                            <a class="item-social" href=""><img src="../img/icon_apple.png" alt=""></a>
                            <a class="item-social" href=""><img src="../img/icon_google.png" alt=""></a>
                            <a class="item-social" href=""><img src="../img/icon_facebook.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </form>

            <div class="img-login">
                <!-- <img class="img" src="img/abstract.png" alt=""> -->
            </div>
        </div>
    </div>

    <script src="../js/global.js"></script>

    <!-- <script>
        // Función para manejar el envío del formulario
        document.getElementById('formLogin').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

            // Obtener todos los inputs del formulario
            var inputs = this.querySelectorAll('input');

            // Iterar sobre los inputs
            inputs.forEach(function(input) {
                // Verificar si el input está vacío
                if (input.value.trim() === '') {
                    // Si está vacío, quitar la clase 'input-filled' y agregar la clase 'input-empty'
                    input.classList.remove('input-filled');
                    input.classList.add('input-empty');
                } else {
                    // Si no está vacío, quitar la clase 'input-empty' y agregar la clase 'input-filled'
                    input.classList.remove('input-empty');
                    input.classList.add('input-filled');
                }
            });
        });
    </script> -->
</body>
</html>