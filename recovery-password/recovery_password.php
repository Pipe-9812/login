<?php

    include_once('../connection.php');

    $email = $_POST['user_email'];

    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date( "Y-m-d H:i:s", time() + 60 * 30 );

    // Conexion con Mysqli
    // $mysqli = require __DIR__ . "/database.php";
    // $sql = "UPDATE user SET reset_token_hash = ?, reset_token_expires_at = ? WHERE email = ?";
    // $stmt = $mysqli->prepare($sql);
    // $stmt->bind_param("sss", $token_hash, $expiry, $email);
    // $stmt->execute();

    // if ($mysqli->affected_rows) { 
    //     // Código aqui
    // }

    $sql = 'UPDATE t_users SET reset_token_hash = ?, reset_token_expires_at = ? WHERE user_email = ?';
    $statement = $pdo->prepare($sql);
    
    // Vincular los parámetros a la consulta preparada
    $statement->bindParam(1, $token_hash, PDO::PARAM_STR);
    $statement->bindParam(2, $expiry, PDO::PARAM_STR);
    $statement->bindParam(3, $email, PDO::PARAM_STR);

    $statement->execute();

    // Verificar si alguna fila fue afectada por la actualización
    if ($statement->rowCount() > 0) {
        $mail = require __DIR__ . "/mailer.php";
        
        $mail->setFrom("luisfelipe98designer@gmail.com");
        $mail->addAddress($email);
        $mail->Subject = "Password Recovery";
        $mail->Body = <<<END

        Click <a href="http://localhost/login/recovery-password/reset_password.php?token=$token">here</a>
        to reset your password.

        END;

        try {
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
        }

    }

    // Redirigir a otra pagina
    echo "Message sent, please check your inbox.";
    header('Location:../sign_in/layout_sign_in.php?sent=1');
    exit()

    ?>


