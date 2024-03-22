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
            <form class="form-login" action="sign_up.php" method="post">
                <div class="card-login">
                    <div class="header-login">
                        <h1>Sign Up</h1>
                        <small>Please enter your details.</small>
                    </div>

                    <div class="body-login">
                        <?php if (isset($_GET["alert"]) && $_GET["alert"] == 1) : ?>
                            <div class="alert-sign-in">
                                The user already exists, please try another one.
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_GET["alert"]) && $_GET["alert"] == 3) : ?>
                            <div class="alert-sign-in">
                                Please fill out all fields.
                            </div>
                        <?php endif; ?>

                        <div class="inp <?php echo (isset( $_GET['new_user']) && $_GET['new_user'] !== '' ) ? 'input-filled' : (isset( $_GET['new_user']) ? 'input-empty' : 'border-silver'), (isset( $_GET['alert']) && $_GET['alert'] == 1 ? 'input-empty' : 'border-silver'); ?>" style="margin-bottom: 1rem;">
                            <input placeholder="Username" type="text" name="new_user" 
                            value="<?php echo isset($_GET['new_user']) ? htmlspecialchars($_GET['new_user']) : ''; ?>">
                            <span class="box-icon">
                                <i class="far fa-user"></i>
                            </span>
                        </div>

                        <!-- <div class="inp">
                            <input placeholder="Email" type="email" autocomplete="off">
                            <span class="box-icon">
                                <i class="far fa-envelope"></i>
                            </span>
                        </div> -->

                        <?php if (isset($_GET["alert"]) && $_GET["alert"] == 2) : ?>
                            <div class="alert-sign-in">
                                Password does not match.
                            </div>
                        <?php endif; ?>

                        <div class="inp  <?php echo (isset( $_GET['new_password']) && $_GET['new_password'] !== '' ) ? 'input-filled' : (isset( $_GET['new_password']) ? 'input-empty' : 'border-silver' ); ?>">
                            <input class="password" placeholder="Password" type="password" autocomplete="off" name="new_password" value="<?php echo isset($_GET['new_password']) ? htmlspecialchars($_GET['new_password']) : ''; ?>">

                            <span class="box-icon">
                                <i class="far fa-eye icon-toggle" onclick="changeType(this)"></i>
                            </span>
                        </div>

                        <div class="inp <?php echo (isset( $_GET['verify_password']) && $_GET['verify_password'] !== '' ) ? 'input-filled' : (isset( $_GET['verify_password']) ? 'input-empty' : 'border-silver' ); ?>">
                            <input class="password" placeholder="Verify Password" type="password" autocomplete="off" name="verify_password" value="<?php echo isset($_GET['verify_password']) ? htmlspecialchars($_GET['verify_password']) : ''; ?>">

                            <span class="box-icon">
                                <i class="far fa-eye icon-toggle" onclick="changeType(this)"></i>
                            </span>
                        </div>

                        <button type="submit" class="btn-custom">Create Account</button>

                        <span class="link">
                            Already have an Account? &nbsp;
                            <a href="../sign_in/layout_sign_in.php">Sign in</a>
                        </span>
                    </div>
                </div>
            </form>

            <div class="img-login">
                <!-- <img class="img" src="img/abstract.png" alt=""> -->
            </div>
        </div>
    </div>

    <script src="../js/global.js"></script>
</body>
</html>