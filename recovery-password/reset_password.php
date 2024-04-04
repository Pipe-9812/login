<?php

    include_once('../connection.php');

    $token = $_GET['token'];
    $token_hash = hash( "sha256", $token );

    $sql = "SELECT * FROM t_users WHERE reset_token_hash = ?";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $token_hash, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    

    if ( $result === false ) {
        die("token not found");
    }

    if (strtotime($result["reset_token_expires_at"]) <= time()) {
        die("token has expired");
    }

    // $newPassword = $_POST['new_password'];
    // $verifyPassword = $_POST['verify_password'];
    // $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

    // if( empty($newPassword) || empty($verifyPassword) ) {
    //     header('Location:reset_password.php?token=' . $token . '&alert=1&new_password=' . urlencode($newPassword) . '&verify_password=' . urlencode($verifyPassword) );
    //     exit();
    // }

    // if( password_verify($verifyPassword, $newPasswordHash) ) {
    //     header('Location:process_reset_password.php');
    //     exit();

    // } else {
    //     header('Location:reset_password.php?token=' . $token . '&alert=2&new_password=' . urlencode($newPassword) . '&verify_password=' . urlencode($verifyPassword) );
    //     exit();
    // }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/global.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="height: 100%;">

    <div class="container">
        <div class="box-login">

            <?php if ( !isset( $_GET["updated"] ) ) : ?>
                <form class="form-login" action="process_reset_password.php" method="post">
                    <div class="card-login">
                        <div class="header-login">
                            <h1>Reset Password</h1>
                            <small>Please enter your new password</small>
                        </div>

                        <div class="body-login">
                            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token) ?>">

                            <?php if ( isset( $_GET["alert"] ) && $_GET["alert"] == 1 ) : ?>
                                <div class="alert-sign-in">
                                    Please fill out all fields.
                                </div>
                            <?php endif; ?>

                            <?php if ( isset($_GET["alert"]) && $_GET["alert"] == 2 ) : ?>
                                <div class="alert-sign-in">
                                    Password does not match.
                                </div>
                            <?php endif; ?>

                            <div class="inp <?php echo (isset( $_GET['new_password']) && $_GET['new_password'] !== '' ) ? 'input-filled' : (isset( $_GET['new_password']) ? 'input-empty' : 'border-silver' ); ?>">
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

                            <button type="submit" class="btn-custom">Send</button>

                            <!-- <span class="link">                           
                                <a href="../sign_in/layout_sign_in.php">Back to Sign In</a>
                            </span> -->
                        </div>
                    </div>
                </form>
            <?php endif ?>

            <?php if ( isset($_GET["updated"]) && $_GET["updated"] == 1 ) : ?>
                <div class="form-login">
                    <div class="card-login">
                        <div class="alert-success">
                            <i class="fa-solid fa-lock icon-success"></i>
                            <span style="text-align: center;">
                                Password Updated. <br> You can now login
                            </span>
                        </div>
                        
                        <div class="body-login" style="margin-top: 1rem;">
                            <a href="../sign_in/layout_sign_in.php" class="btn-custom">
                                Go to Log In
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="img-login">

            </div>
        </div>
    </div>

    <script src="../js/global.js"></script>
</body>
</html>

